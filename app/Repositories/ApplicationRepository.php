<?php

namespace App\Repositories;

use App\Models\Application;
use App\Services\Media;

class ApplicationRepository extends Repository
{

    /**
     * @inheritDoc
     */
    public function model()
    {
        return Application::class;
    }

    public function getByPaginate($limit = 15)
    {
        return $this->query()->withCount('clients')->active()->latest()->paginate($limit);
    }

    public function storeByRquest($request)
    {
        $path = null;

        if ($request->hasFile('app_icon')) {
            $path = Media::fileUpload($request, 'app_icon', 'icons');
        }

        return $this->query()->create([
            'ref' => 'APP#'.substr(md5(time()), 0, 16),
            'name' => $request->name,
            'description' => $request->description,
            'firebase_server_key' => $request->firebase_server_key,
            'created_by' => auth('web')->user()->id,
            'icon' => $path
        ]);
    }

    public function updateByRequest($request, $applicationId)
    {
        $application = $this->query()->findOrFail($applicationId);

        $path = $application->icon;

        if ($request->hasFile('icon')) {
            $path = 'Something'; //TODO upload file
        }

        return $application->update([
            'ref' => substr(md5(time()), 0, 24),
            'name' => $request->name,
            'fcm_api_key' => $request->fcm_api_key,
            'icon' => $path
        ]);
    }

    public function deleteByRequest($applicationId)
    {
        return $this->query()->findOrFail($applicationId)->delete();
    }
}
