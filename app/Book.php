<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Book extends Model
{
    use Searchable;
    
    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany('App\User'); // do we actually need this? // we can get to this: "user->reservations->book->something"
    }

    public function reservations()
    {
        return $this->hasMany('App\Reservation');
    }

    public function searchableAs()
    {
        return 'title';
    }
}
