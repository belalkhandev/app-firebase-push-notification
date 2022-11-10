<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'application_id',
        'timezone_id',
        'activity',
        'title',
        'description',
        'image',
        'created_by'
    ];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }

    public function timezone()
    {
        return $this->belongsTo(Timezone::class);
    }

    public function reports()
    {
        return $this->hasMany(NotificationReport::class, 'notification_id', 'id')->latest();
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
}
