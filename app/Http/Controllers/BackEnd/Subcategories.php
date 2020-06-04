<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
class Subcategories extends Controller
{
    public function index(){
        $rows = Subcategory::all();
        return view('back-end.subcategories.index',compact('rows'));
    }
    public function create(){
        $rows = Category::all();
        return view('back-end.subcategories.create',compact('rows'));
    }
    public function store(Request $request){
        $fileName = $this->uploadImage($request);
        $requestArray =  ['image_url' => $fileName] + $request->all();
        $row = Subcategory::create($requestArray);
        return redirect()->route('subcategories.index');
    }
    public function edit($id){
        $rows = Subcategory::FindOrFail($id);
        return view('back-end.subcategories.edite',compact('rows'));
    }
    public function update(Request $request,$id){
        $requestArray = $request->all();
        if($request->hasFile('image')){
            $fileName = $this->uploadImage($request);
            $requestArray = ['image' => $fileName] + $requestArray;
        }
        $row = Subcategory::FindOrFail($id);
        $row->update($requestArray);
        return redirect()->route('subcategories.index');
    }
    public function destroy($id)
    {
        Subcategory::FindOrFail($id)->delete();

        return redirect()->route('subcategories.index');
    }
    protected function uploadImage($request){
        $file = $request->file('image');
        $fileName = time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('uploads') , $fileName);
        return $fileName;
    }
}
