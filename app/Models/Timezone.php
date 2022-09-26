<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timezone extends Model
{
    use HasFactory;

    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
}
