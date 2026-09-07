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
        'description',
        'image'
    ];
    
    protected $casts = [
        'count' => 'array',
        'suspects' => 'array',
    ];

    public function favourites() {
        return $this->morphMany(Favourite::class, 'favouritetable');
    }

    public function discussions() {
        return $this->morphMany(Discussion::class, 'discussable');
    }
}
