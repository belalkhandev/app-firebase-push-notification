<?php

namespace App\Http\Controllers;

use App\Repositories\ApplicationRepository;
use App\Repositories\NotificationRepository;
use App\Repositories\TimezoneRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class NotificationController extends Controller
{
    private $notificationRepo;
    private $applicationRepo;
    private $timezoneRepo;

    public function __construct(NotificationRepository $notificationRepository, ApplicationRepository $applicationRepository, TimezoneRepository $timezoneRepository)
    {
        $this->notificationRepo = $notificationRepository;
        $this->applicationRepo = $applicationRepository;
        $this->timezoneRepo = $timezoneRepository;
    }

    public function index()
    {
        $notifications = $this->notificationRepo->getByPaginate(15);

        return Inertia::render('Notification/Index', [
            'notifications' => $notifications
        ]);
    }

    public function show($notificationId)
    {
        $notification = $this->notificationRepo->findOrFail($notificationId);

        return Inertia::render('Notification/Show', [
            'notification' => $notification
        ]);
    }

    public function create()
    {
        $applications = $this->applicationRepo->query()->active()->get();
        $timezones = $this->timezoneRepo->query()->get();

        return Inertia::render('Notification/Create', [
            'applications' => $applications,
            'timezones' => $timezones
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'application_id' => 'required',
            'title' => 'required'
        ]);

        $notification = $this->notificationRepo->storeByRquest($request);

        if (!$notification) {
            return redirect()->back()->with('message', 'Failed to store notification');
        }

        //send notification
        if ($request->is_send) {
            //toDo sent notfication

            return redirect()->back()->with('message', 'Notification has been sent');
        }

        return redirect()->back()->with('message', 'Notification has been stored successfully');

    }

    public function edit($notificationId)
    {
        $notification = $this->notificationRepo->findOrFail($notificationId);

        return Inertia::render('Notification/Edit', [
            'notification' => $notification
        ]);
    }

    public function update(Request $request, $notificationId)
    {
        $this->validate($request, [
            'application_id' => 'required',
            'title' => 'required'
        ]);

        $notification = $this->notificationRepo->updateByRequest($request, $notificationId);

        if (!$notification) {
            return redirect()->back()->with('message', 'Failed to update notification');
        }

        return redirect()->back()->with('message', 'Notification has been updated successfully');
    }
}
