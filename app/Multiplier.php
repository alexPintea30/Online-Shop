<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Multiplier extends Model
{

    protected $fillable = [
        'name',
        'identifier',
        'multiplier'
    ];

    public function versions()
    {
        return $this->belongsToMany(Version::class);
    }
}
