<?php

namespace App\Http\Controllers;

use App\Repositories\ApplicationRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ApplicationController extends Controller
{
    private $appRepo;

    public function __construct(ApplicationRepository $applicationRepository)
    {
        $this->appRepo = $applicationRepository;
    }

    public function index()
    {
        $applications = $this->appRepo->getByPaginate(10);

        return Inertia::render('Application/List', [
            'applications' => $applications
        ]);
    }

    public function create()
    {
        return Inertia::render('Application/Create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'firebase_server_key' => 'required'
        ]);

        $application = $this->appRepo->storeByRquest($request);

        if (!$application) {
            return redirect()->back()->with('message', 'Failed to store application');
        }

        return redirect()->back()->with('message', 'Application has been stored successfully');
    }


    public function edit($applicationId)
    {
        $application = $this->appRepo->findOrFail($applicationId);

        return Inertia::render('Application/Edit', [
            'application' => $application
        ]);
    }

    public function applicationClients()
    {
        return Inertia::render('Clients');
    }
}
