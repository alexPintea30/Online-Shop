<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
