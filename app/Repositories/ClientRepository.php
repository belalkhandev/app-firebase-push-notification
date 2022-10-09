<?php

namespace App\Repositories;

use App\Models\Client;

class ClientRepository extends Repository
{

    /**
     * @inheritDoc
     */
    public function model()
    {
        return Client::class;
    }

    public function getByPaginate($limit = 15)
    {
        return $this->query()->paginate($limit);
    }

    public function storeByRquest($request)
    {
        $applicationRepo = app(ApplicationRepository::class);
        $timezoneRepo = app(TimezoneRepository::class);

        $application  = $applicationRepo->query()
            ->where('ref', $request->application_ref)
            ->findOrFail();

        $timezone  = $timezoneRepo->query()
            ->where('timezone', $request->timezone)
            ->findOrFail(); //todo: create or first timezone

        return $this->query()->create([
            'application_id' => $application->id,
            'timezone_id' => $timezone->id,
            'uid' => $request->uid,
        ]);
    }
}
