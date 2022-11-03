<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'notification_id',
        'timezone_id',
        'app_users',
        'success_send',
        'failed_send'
    ];
}
