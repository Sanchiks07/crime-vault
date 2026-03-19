<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Victim extends Model
{
    protected $fillable = [
        'killer_id',
        'count'
    ];
    
    protected $casts = [
        'count' => 'array',
    ];
}
