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

        return Inertia::render('Timezone/Index', [
            'timezones' => $timezones
        ]);
    }

    public function create()
    {
        return Inertia::render('Timezone/Create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'timezone' => 'required|unique:timezones,timezone|max:6'
        ]);

        //check exist or not
        $timezone = $this->timezoneRepo->storeByRquest($request);

        if (!$timezone) {
            return redirect()->back()->with('message', 'Failed to store timezone');
        }

        return redirect()->back()->with('message', 'Timezone saved successfully');
    }

    public function edit($timezoneId)
    {
        $timezones = $this->timezoneRepo->getByPaginate(10);
        $timezone = $this->timezoneRepo->findOrFail($timezoneId);

        return Inertia::render('Timezone/Edit', [
            'timezones' => $timezones,
            'timezone' => $timezone
        ]);
    }

    public function destroy($timezoneId)
    {
        if ($this->timezoneRepo->deleteByRequest($timezoneId)) {
            return redirect()->route('timezone.list')->with('message', 'Timezone deleted successfully');
        }

        return redirect()->back()->with('message', 'Failed to delete timezone');
    }

}
