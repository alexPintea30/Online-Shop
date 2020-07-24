<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    public function multipliers()
    {
        return $this->belongsToMany(Multiplier::class);
    }
}
