<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = [
        'title', 'desc', 'lat','lng','user_id', 'sub_cat_id', 'published',
    ];

    public function images(){
        return $this->hasMany(Image::class,'ad_id');
    }
    public function bids(){
        return $this->hasMany(Bid::class,'ad_id');
    }
    public function subCategory(){
        return $this->belongsTo(Subcategory::class,'sub_cat_id');
    }
}
