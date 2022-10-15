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
            'timezone' => 'required|unique:timezones,timezone|max:6'
        ]);

        //check exist or not
        $timezone = $this->timezoneRepo->storeByRquest($request);

        if (!$timezone) {
            return redirect()->back()->with('message', 'Failed to store timezone');
        }

        return redirect()->route('timezone.list')->with('message', 'Timezone saved successfully');
    }

    public function destroy($timezoneId)
    {
        if ($this->timezoneRepo->deleteByRequest($timezoneId)) {
            return redirect()->route('timezone.list')->with('message', 'Timezone deleted successfully');
        }

        return redirect()->back()->with('message', 'Failed to delete timezone');
    }

}
