<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnsolvedCase extends Model
{
    protected $fillable = [
        'name',
        'country',
        'count',
        'suspects',
        'image'
    ];
    
    protected $casts = [
        'count' => 'array',
        'suspects' => 'array',
    ];
}
