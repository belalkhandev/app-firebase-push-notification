<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'application_id',
        'timezone_id',
        'uid'
    ];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }

    public function timezone()
    {
        return $this->belongsTo(Timezone::class);
    }
}
