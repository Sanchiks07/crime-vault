<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Victim;

class SerialKiller extends Model
{
    protected $fillable = [
        'name',
        'nickname',
        'ages',
        'country',
        'victim_count',
        'description',
        'image'
    ];
    
    protected $casts = [
        'ages' => 'array',
        'victim_count' => 'array',
    ];

    public function victimRecord() {
        return $this->hasOne(Victim::class, 'killer_id');
    }
}
