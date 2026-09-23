<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaseEvent extends Model
{
    protected $fillable = [
        'title',
        'event_type',
        'event_date',
        'location',
        'latitude',
        'longitude',
        'description'
    ];

    protected $casts = [
        'event_date' => 'date',
        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7'
    ];

    public function eventable() {
        return $this->morphTo();
    }
}
