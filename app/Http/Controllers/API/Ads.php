<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdResource;
use App\Http\Resources\ImagesResource;
use App\Models\Ad;
use App\Models\Category;
use App\Models\Image;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use League\CommonMark\Inline\Renderer\ImageRenderer;
class Ads extends Controller
{
    public function store(Request $request){
        $row = $request->all();
        $row['user_id'] = auth()->user()->id;
        $ad = Ad::create($row);
        if($request->hasfile('images'))
        {
            foreach($request->file('images') as $image)
            {
                $name=time().'.'.$image->getClientOriginalName();
                $image->move(public_path().'/uploads/', $name);
                $data[] = $name;
                $image = new Image(['image_url'=>public_path().'/uploads/'.$name,'ad_id'=>$ad->id]);
                $ad->images()->save($image);
            }
        }
        $ad['images'] = $ad->images;
        return response()->json($ad);
                                     }
        public function destroy($id){
        $row = Ad::FindOrFail($id);
         if (auth()->user()->id == $row->user_id){
            $row->delete();
            return response()->json('deleted successfully');
           }else{
            return response()->json('error');
           }
    }

   public function showAdd($id){
       $add_data=Ad::FindOrFail($id);
       $images=$add_data->images;
       return response()->json(['data'=>new AdResource($add_data),'images'=>ImagesResource::collection($images)]);
    }

    public function showSubAds($id){
        $data =[];
        $subCat=Subcategory::FindOrFail($id);
       $adds = $subCat->ads;
        foreach ($adds as $ad){
            $detals['images'] = ImagesResource::collection($ad->images);
            $detals['details'] = new AdResource($ad);
            $data[] = $detals;
       }
        return response()->json($data);
    }

    public function catigoryAdds($id){
        $data =[];
        $cat = Category::FindOrFail($id);
        foreach ($cat->adds as $ad){
            $detals['details'] = new AdResource($ad);
            $detals['images'] = ImagesResource::collection($ad->images);
            $detals['bids'] = $ad->bids;
            $data[] = $detals;
        }
        return response()->json($data);
    }
}
