<?php

namespace App\Repositories;

use App\Models\Application;

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
        return $this->query()->active()->paginate($limit);
    }

    public function storeByRquest($request)
    {
        $path = null;

        if ($request->hasFile('icon')) {
            $path = 'Something'; //TODO upload file
        }

        return $this->query()->create([
            'ref' => substr(md5(time()), 0, 24),
            'name' => $request->name,
            'fcm_api_key' => $request->fcm_api_key,
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
