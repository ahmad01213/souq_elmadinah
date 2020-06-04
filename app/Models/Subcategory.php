<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = [
        'name', 'image_url','cate_id'
    ];
    public function cat(){
        return $this->belongsTo(Category::class,'cate_id');
    }
    public function ads(){
        return $this->hasMany(Ad::class,'sub_cat_id');
    }
}
