<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class petsubcategory extends Model
{
    use SoftDeletes;

    protected $table = 'petsubcategories';

//ya petcategories table ma category_id ka bata rahi ha ka category_id ki key petsubcategory ka table ma forenkey ha.
    public function petcategory()
     {
        return $this->belongsTo('App\Petcategory', 'category_id');
     }
       public function posts()
    {
        return $this->hasMany('App\Post','petsub_category');
    }  
}
