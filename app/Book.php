<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //books Table 
    //? protected $table="ahmed_books";

    public function author()
    {
        return $this->belongsTo('App\Author');
    }

    public function libraries()
    {
        return $this->hasMany('App\Library');
    }
}
