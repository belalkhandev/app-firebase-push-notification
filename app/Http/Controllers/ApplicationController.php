<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = 'write something about inertia';

        return Inertia::render('Application', [
            'applications' => $applications
        ]);
    }
}
