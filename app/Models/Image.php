<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'image_url', 'ad_id'
    ];
    public function Ad(){
        return $this->belongsTo(Ad::class,'ad_id');
    }
}
