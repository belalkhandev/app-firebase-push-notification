<?php

namespace App\Http\Controllers;

use App\Repositories\ApplicationRepository;
use App\Repositories\NotificationRepository;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class DashboardController extends Controller
{
    private $applicationRepo;
    private $notificationRepo;

    public function __construct(ApplicationRepository $applicationRepository, NotificationRepository $notificationRepository)
    {
        $this->applicationRepo = $applicationRepository;
        $this->notificationRepo = $notificationRepository;
    }

    public function index()
    {
        $applications = $this->applicationRepo->query()->select('id', 'name', 'icon')->withCount('clients')->active()->get();
        $notifications = $this->notificationRepo->query()->with('application:id,name')->latest()->take(5)->get();

        return Inertia::render('Dashboard', [
            'applications' => $applications,
            'notifications' => $notifications,
            'canLogin' => Route::has('login'),
        ]);
    }
}
