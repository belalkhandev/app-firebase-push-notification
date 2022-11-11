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
    * @var NotificationReportRepository $notificationReportRepository
    */
    private $notificationReportRepo;

    /**
     * @inheritDoc
     */
    public function model()
    {
        return Notification::class;
    }

    public function getByPaginate($limit = 15)
    {
        return $this->query()
            ->with('application:id,name', 'timezone:id,timezone')
            ->active()
            ->latest()
            ->paginate($limit);
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
            'activity' => $request->activity,
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
            'activity' => $request->activity,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path
        ]);
    }

    public function deleteByRequest($notificationId)
    {
        return $this->query()->findOrFail($notificationId)->delete();
    }

    public function sendPushNotification(Notification $notification, $timezoneId)
    {
        $application = app(ApplicationRepository::class);
        $this->notificationReportRepo = app(NotificationReportRepository::class);

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
            "image" => $notification->image ? URL::to('/' . $notification->image) : null
        ];

        $uids = $uids->chunk(999);

        $notificationReportData = [
            'notification_id' => $notification->id,
            'timezone_id' => $notification->timezone_id,
            'users' => 0,
            'success' => 0,
            'failure' => 0
        ];

        foreach ($uids as $reg_uids) {
            $data = [
                "registration_ids" => $reg_uids->pluck('uid')->toArray(),
                "data" => $message
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

            $notificationReportData['users'] += count($reg_uids);
            $notificationReportData['success'] += $response['success'];
            $notificationReportData['failure'] += $response['failure'];
        }

        return $this->notificationReportRepo->query()->create($notificationReportData);

    }

    public function getLatestNotificationReportByNotificationId($notificationId)
    {
        $this->notificationReportRepo = app(NotificationReportRepository::class);

        return $this->notificationReportRepo->query()
            ->where('notification_id', $notificationId)->latest()
            ->firstOrFail();
    }
}
