<?php

namespace App\Repositories;

use App\Models\Timezone;

class TimezoneRepository extends Repository
{

    /**
     * @inheritDoc
     */
    public function model()
    {
        return Timezone::class;
    }

    public function getByPaginate($limit = 15)
    {
        return $this->query()->active()->paginate($limit);
    }

    public function storeByRquest($request)
    {
        return $this->query()->create([
            'name' => $request->name,
            'timezone' => $request->timezone,
            'is_active'=> 1
        ]);
    }

    public function updateByRequest($request, $timezoneId)
    {
        return $this->query()->findOrFail($timezoneId)->update([
            'name' => $request->name,
            'timezone' => $request->timezone,
            'is_active'=> 1
        ]);
    }

    public function deleteByRequest($timezoneId)
    {
        return $this->query()->findOrFail($timezoneId)->delete();
    }
}
