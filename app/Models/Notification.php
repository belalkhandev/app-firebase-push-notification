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

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
}
