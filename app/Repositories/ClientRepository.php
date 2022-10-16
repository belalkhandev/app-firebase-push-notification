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
        return $this->query()->with('timezone', 'application')->paginate($limit);
    }

    public function storeByRquest($request)
    {
        $applicationRepo = app(ApplicationRepository::class);
        $timezoneRepo = app(TimezoneRepository::class);

        $application  = $applicationRepo->query()->where('ref', $request->application_ref)
            ->firstOrFail();

        $timezone  = $timezoneRepo->query()->firstOrCreate([
            'timezone' => $request->timezone
        ]);

        return $this->query()->updateOrCreate([
            'uid' => $request->uid,
        ],[
            'application_id' => $application->id,
            'timezone_id' => $timezone?->id
        ]);
    }
}
