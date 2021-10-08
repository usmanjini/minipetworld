<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'products';
    
 

    public function images()
    {
        return $this->hasMany('App\Image');
    }
    
    public function category()
     {
        return $this->belongsTo('App\Category', 'category');
     }
      public function subcategory()
     {
        return $this->belongsTo('App\subcategory', 'sub_category');
     }
}
