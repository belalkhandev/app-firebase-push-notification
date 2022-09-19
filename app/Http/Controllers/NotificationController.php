<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = 'write something about notification';

        return Inertia::render('Notification/Notification', [
            'notifications' => $notifications
        ]);
    }
}
