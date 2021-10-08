<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postimage extends Model
{
    protected $table = 'postimages';

     public function post()
     {
        return $this->belongsTo('App\Post', 'post_id');
     }
}
