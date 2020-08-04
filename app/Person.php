<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    public function autorul(){
        return $this->hasOne(author::class);

    }

    public function region(){
        return $this->hasOne('App\Region','judetID');
    }
    public function user(){
        return $this->hasOne('App\User','personID');
    }
    protected $fillable=['nume','prenume','data_nasterii','judetID'];
}
