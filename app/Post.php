<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $table = 'posts';
    
 

    public function postimages()
    {
        return $this->hasMany('App\Postimage');
    }
    
    public function petcategory()
     {
        return $this->belongsTo('App\Petcategory', 'petcategory');
     }
      public function petsubcategory()
     {
        return $this->belongsTo('App\petsubcategory', 'petsub_category');
     }
}
