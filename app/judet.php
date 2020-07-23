<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class judet extends Model
{
    public function persoane(){
        return $this->belongsToMany(person::class);
    }
}
