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
            'app_users' => $request->total_users,
            'success_send' => $request->success,
            'failed_send' => $request->failure,
            'canonical_ids' => $request->canonical_ids,
        ]);
    }
}
