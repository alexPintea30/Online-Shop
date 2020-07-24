<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    public function autorul(){
        return $this->hasOne(author::class);

    }

    public function judet(){
        return $this->hasOne(Region::class);
    }
}
