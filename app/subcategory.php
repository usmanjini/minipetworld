<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class subcategory extends Model
{
    use SoftDeletes;

    protected $table = 'subcategories';

	
    public function category()
     {
        return $this->belongsTo('App\Category', 'category_id');
     }
       public function products()
    {
        return $this->hasMany('App\Product','sub_category');
    }  
}
