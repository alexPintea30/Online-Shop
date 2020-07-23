<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class author extends Model
{
    public function books(){
    return $this->hasMany(book::class,'authorID');
    }

    public function persoana(){
        return $this->belongsTo(person::class,'personID');
    }
}
