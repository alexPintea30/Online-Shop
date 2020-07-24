<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public function persoane(){
        return $this->belongsToMany(person::class, 'people','judetID');
    }
}
