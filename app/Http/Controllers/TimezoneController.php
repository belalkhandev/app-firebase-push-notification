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
        $timezones = $this->timezoneRepo->getByPaginate(10);

        return Inertia::render('Timezone', [
            'timezones' => $timezones
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'timezone' => 'required|max:6'
        ]);

        //check exist or not
        $timezone = $this->timezoneRepo->storeByRquest($request);

        if (!$timezone) {
            return Inertia::render('Timezone', [
                'message' => 'Failed to store',
            ]);
        }

        return Inertia::render('Timezone', [
            'message' => 'Has been stored successfully'
        ]);
    }

}
