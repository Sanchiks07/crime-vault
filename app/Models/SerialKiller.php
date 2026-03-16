<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SerialKiller extends Model
{
    protected $fillable = [
        'name',
        'nickname',
        'age',
        'country',
        'victims',
    ];
    
    protected $casts = [
        'victims' => 'array',
    ];
}
