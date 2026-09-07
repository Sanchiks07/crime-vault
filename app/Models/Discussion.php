<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    protected $fillable = [
        'user_id',
        'discussable_id',
        'discussable_type',
        'content',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function discussable() {
        return $this->morphTo();
    }
}
