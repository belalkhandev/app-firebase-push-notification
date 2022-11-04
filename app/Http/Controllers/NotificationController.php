<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Repositories\ApplicationRepository;
use App\Repositories\ClientRepository;
use App\Repositories\NotificationRepository;
use App\Repositories\TimezoneRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class NotificationController extends Controller
{
    private $notificationRepo;
    private $applicationRepo;
    private $timezoneRepo;
    private $clientRepo;

    public function __construct(
        NotificationRepository $notificationRepository,
        ApplicationRepository $applicationRepository,
        TimezoneRepository $timezoneRepository,
        ClientRepository $clientRepository
    )
    {
        $this->notificationRepo = $notificationRepository;
        $this->applicationRepo = $applicationRepository;
        $this->timezoneRepo = $timezoneRepository;
        $this->clientRepo = $clientRepository;
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
            $this->notificationRepo->sendPushNotification($notification, $request->timezone_id);

            return redirect()->back()->with('message', 'Notification has been stored and sent');
        }

        return redirect()->back()->with('message', 'Notification has been stored successfully');

    }

    public function edit($notificationId)
    {
        $notification = $this->notificationRepo->findOrFail($notificationId);
        $applications = $this->applicationRepo->query()->active()->get();
        $timezones = $this->timezoneRepo->query()->get();

        return Inertia::render('Notification/Edit', [
            'notification' => $notification,
            'applications' => $applications,
            'timezones' => $timezones
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

    public function destroy($notificationId)
    {
        if ($this->notificationRepo->deleteByRequest($notificationId)) {
            return redirect()->back()->with('message', 'Notification deleted successfully');
        }

        return redirect()->back()->with('message', 'Failed to delete notification');
    }

    public function getNotificationUsers(Request $request)
    {
        $users = 0;

        if ($request->application_id && $request->application_id != '') {
            $users = $this->clientRepo->query()->select('id')->where('application_id', $request->application_id);
            if ($request->timezone_id && $request->timezone_id != '') {
                $users = $users->where('timezone_id', $request->timezone_id);
            }

            $users = $users->count();
        }

        return response()->json([
            'users' => $users
        ]);
    }
}
