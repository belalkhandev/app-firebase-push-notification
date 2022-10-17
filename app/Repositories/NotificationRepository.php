<?php

namespace App\Repositories;

use App\Models\Application;
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
}
