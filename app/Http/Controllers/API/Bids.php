<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\Bid;
use App\Models\Image;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class Bids extends Controller
{
    public function store(Request $request,$ad){
        $row = $request->all();
        $row['user_id'] = auth()->user()->id;
        $add = Ad::findOrFail($ad);
        $bid = new Bid($row);
        $add->bids()->save($bid);
        return response()->json($row);
    }
}
