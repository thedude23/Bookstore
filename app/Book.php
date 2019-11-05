<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany('App\User'); // do we actually need this? // we can get to this: "user->reservations->book->something"
    }

    public function reservations()
    {
        return $this->hasMany('App\Reservation');
    }
}
