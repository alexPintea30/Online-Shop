<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function author()
    {
        return $this->hasOne(Author::class);
    }

    public function counties()
    {
        return $this->hasMany(County::class);
    }
}
