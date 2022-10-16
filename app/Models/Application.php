<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'ref',
        'name',
        'fcm_api_key',
        'icon',
        'created_by'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
