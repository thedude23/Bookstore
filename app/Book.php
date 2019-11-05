<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function reservations()
    {
        return $this->hasMany('App\Reservation');
    }
}
