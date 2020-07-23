<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function category()
    {
        return $this->hasOne(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
