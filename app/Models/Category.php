<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
    'name', 'image_url'
];

    public function subs(){
        return $this->hasMany(Subcategory::class,'cate_id');
    }

   public function adds(){
        return $this->hasManyThrough(Ad::class,Subcategory::class,'cate_id','sub_cat_id');
    }
}
