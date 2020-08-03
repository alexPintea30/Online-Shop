<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Person;

class Region extends Model
{
    public function persoane(){
        return $this->belongsToMany(person::class, 'people','judetID');
    }
}
