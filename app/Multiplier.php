<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Multiplier extends Model
{
    public function versions()
    {
        return $this->belongsToMany(Version::class);
    }
}
