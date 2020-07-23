<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
