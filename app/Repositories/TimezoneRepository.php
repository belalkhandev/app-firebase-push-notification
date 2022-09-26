<?php

namespace App\Repositories;

use App\Models\Timezone;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class TimezoneRepository extends Repository
{

    /**
     * @inheritDoc
     */
    public function model()
    {
        return Timezone::class;
    }

    public function getByPaginate()
    {
        return $this->query()->active()->paginate();
    }

    public function storeByRquest($request)
    {
        return $this->query()->firstOrCreate([
            'name' => $request->name,
            'timezone' => $request->timezone,
            'is_active'=> 1
        ]);
    }
}
