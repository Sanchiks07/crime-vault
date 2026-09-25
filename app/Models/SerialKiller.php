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

    public function favourites() {
        return $this->morphMany(Favourite::class, 'favouritable');
    }

    public function discussions() {
        return $this->morphMany(Discussion::class, 'discussable');
    }

    public function events() {
        return $this->morphMany(CaseEvent::class, 'eventable');
    }

    // gets the age and then displays it correctly, if there are multiple ages, it will display them separated by a slash
    public function getAgeTextAttribute(): string {
        return collect($this->ages ?? [])
            ->pluck('age')
            ->filter(fn ($age) => !is_null($age))
            ->implode(' / ') ?: 'Unknown';
    }
}
