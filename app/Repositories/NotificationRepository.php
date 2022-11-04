<?php

namespace App\Repositories;

use App\Models\Application;
use App\Models\Client;
use App\Models\Notification;
use App\Services\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class NotificationRepository extends Repository
{
    /**
     * @inheritDoc
     */
    public function model()
    {
        return Notification::class;
    }

    public function getByPaginate($limit = 15)
    {
        return $this->query()->with('application:id,name')->active()->latest()->paginate($limit);
    }

    public function storeByRquest($request)
    {
        $path = null;

        if ($request->hasFile('image')) {
            $path = Media::fileUpload($request, 'image', 'notifications');
        }

        return $this->query()->create([
            'application_id' => $request->application_id,
            'timezone_id' => $request->timezone_id,
            'title' => $request->title,
            'description' => $request->description,
            'created_by' => auth('web')->user()->id,
            'image' => $path
        ]);
    }

    public function updateByRequest($request, $notificationId)
    {
        $notification = $this->query()->findOrFail($notificationId);
        $path = $notification->image;

        if ($request->hasFile('image')) {
            unlink($notification->image);
            $path = Media::fileUpload($request, 'image', 'notifications');
        }

        return $notification->update([
            'application_id' => $request->application_id,
            'timezone_id' => $request->timezone_id,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path
        ]);
    }

    public function deleteByRequest($applicationId)
    {
        return $this->query()->findOrFail($applicationId)->delete();
    }

    public function sendPushNotification(Notification $notification, $timezoneId)
    {
        $application = app(ApplicationRepository::class);
        $notificationRepo = app(NotificationReportRepository::class);
        $uids = Client::select('uid')->where('application_id', $notification->application_id);
        if ($timezoneId) {
            $uids = $uids->where('timezone_id', $timezoneId);

        }

        $uids = $uids->get();

        if ($uids->isEmpty()) {
            throw new \Exception('No user find for the app');
        }

        $serverApiKey = $application->query()->findOrFail($notification->application_id)->firebase_server_key;
        $headers = [
            'Authorization: key=' . $serverApiKey,
            'Content-Type: application/json',
        ];

        $message = [
            "title" => $notification->title,
            "body" => $notification->description,
        ];

        if ($notification->image) {
            $message['picture'] = URL::to('/' . $notification->image);
        }

        $uids = $uids->chunk(750);

        foreach ($uids as $reg_uids) {
            $data = [
                "registration_ids" => $reg_uids->pluck('uid')->toArray(),
                "notification" => $message
            ];

            $dataString = json_encode($data);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
            $response = curl_exec($ch);

            $response = json_decode($response, true);

            $notificationRepo->query()->create([
                'notification_id' => $notification->id,
                'timezone_id' => $notification->timezone_id,
                'success_send' => $response['success'],
                'app_users' => count($reg_uids),
                'failed_send' => $response['failure'],
                //'canonical_ids' => $response['canonical_ids']
            ]);
        }

        return true;
    }
}
