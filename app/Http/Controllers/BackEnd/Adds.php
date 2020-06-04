<?php
namespace App\Http\Controllers\BackEnd;
use App\Http\Controllers\Controller;
use App\Models\Ad;
use Illuminate\Http\Request;

class Adds extends Controller
{
     public function index(){
     $rows = Ad::where('published',"1")->get();
         $stat = "0";
         return view('back-end.ads.index',compact('rows','stat'));
          }

    public function indexSusbended(){
        $rows = Ad::where('published',"0")->get();
        $stat = "1";
        return view('back-end.ads.index',compact('rows','stat'));
    }

    public function destroy($id)
    {
        Ad::FindOrFail($id)->delete();
        return redirect()->route('ads.index');
    }
    public function publish(Request $request,$id)
    {
        $row = Ad::findOrFail($id);
        $row->published= $request['published'];
        $row->save();
        return $request['published'] == "0"? redirect()->route('ads.index'):redirect()->route('ads.sus');
    }
}
