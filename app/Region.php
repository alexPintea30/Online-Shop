<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Person;


class Region extends Model
{
    public function people(){
        return $this->hasMany('App\Person','judetID');
    }
    protected $fillable=['name'];
}
