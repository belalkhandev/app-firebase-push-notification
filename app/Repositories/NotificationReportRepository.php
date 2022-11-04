<?php

namespace App\Repositories;

use App\Models\Client;
use App\Models\Notification;
use App\Models\NotificationReport;

class NotificationReportRepository extends Repository
{

    /**
     * @inheritDoc
     */
    public function model()
    {
        return NotificationReport::class;
    }

    public function storeByRquest($request)
    {
        return $this->query()->updateOrCreate([
            'notification_id' => $request->notification_id,
            'timezone_id' => $request->timezone_id,
            'users' => $request->total_users,
            'success' => $request->success,
            'failure' => $request->failure,
        ]);
    }
}
