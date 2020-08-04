<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function autorul(){
        return $this->belongsTo(author::class,'authorID');
    }

    public function categorie(){
        return $this->hasOne(category::class, 'id', 'categoryID');
    }
}
