<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    public function autorul(){
return $this->belongsTo(author::class,'authorID');
    }

    public function categorie(){
        return $this->hasOne(category::class);
    }
}
