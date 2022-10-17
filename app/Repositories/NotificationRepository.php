<?php

namespace App\Repositories;

use App\Models\Application;
use App\Models\Client;
use App\Models\Notification;
use App\Services\Media;

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
        return $this->query()->active()->latest()->paginate($limit);
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
            $path = Media::fileUpload($request, 'image', 'notifications');
        }

        return $notification->update([
            'application_id' => $request->application_id,
            'timezone_id' => $request->timezone_id,
            'title' => $request->title,
            'description' => $request->description,
            'created_by' => auth('web')->user()->id,
            'image' => $path
        ]);
    }

    public function deleteByRequest($applicationId)
    {
        return $this->query()->findOrFail($applicationId)->delete();
    }

    public function sendPushNotification(Notification $notification, $applicationId)
    {
        $application = app(ApplicationRepository::class);
        $uids = Client::select('uid')->where('application_id', $applicationId)->get();

        if ($uids->isEmpty()) {
            throw new \Exception('No user find for the app');
        }

        $serverApiKey = $application->query()->findOrFail($applicationId)->firebase_server_key;

        $data = [
            "registration_ids" => $uids->pluck('uid')->toArray(),
            "notification" => [
                "title" => $notification->title,
                "body" => $notification->description,
            ]
        ];

        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $serverApiKey,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);

        return true;
    }
}
