<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    protected $fillable = [
        'start_date',
        'end_date',
        'description'
    ];

    public function multipliers()
    {
        return $this->belongsToMany(Multiplier::class);
    }
}
