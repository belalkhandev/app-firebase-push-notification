<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = 'write something about inertia';

        return Inertia::render('Application/List', [
            'applications' => $applications
        ]);
    }

    public function create()
    {
        return Inertia::render('Application/Create');
    }

    public function applicationClients()
    {
        return Inertia::render('Clients');
    }
}
