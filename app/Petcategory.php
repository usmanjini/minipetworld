<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Petcategory extends Model
{
	use SoftDeletes; 

    protected $table = 'petcategories';

    public function petsubcategory()
    {
        return $this->hasMany('App\petsubcategory');
    }
     public function posts()
    {
        return $this->hasMany('App\Post');
    }

    protected $sliders = [
        'slider' => 'array'
    ];


}
