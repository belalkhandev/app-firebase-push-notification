<?php

namespace App\Http\Controllers;

use App\Repositories\TimezoneRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TimezoneController extends Controller
{
    private $timezoneRepo;

    public function __construct(TimezoneRepository $timezoneRepository)
    {
        $this->timezoneRepo = $timezoneRepository;
    }

    public function index()
    {
        return Inertia::render('Timezone');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'timezone' => 'required'
        ]);

        $timezone = $this->timezoneRepo->storeByRquest($request);

        return $timezone;
    }

}
