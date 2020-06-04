<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Categories extends BackEndController
{
    public function index(){
        $rows = Category::all();
        return view('back-end.categories.index',compact('rows'));
    }
    public function create(){
        return view('back-end.categories.create');
    }
    public function store(Request $request){
        $fileName = $this->uploadImage($request);
        $requestArray =  ['image_url' => $fileName] + $request->all();
        $row = Category::create($requestArray);
        return redirect()->route('categories.index');
    }
    public function edit($id){
        $rows = Category::FindOrFail($id);
        return view('back-end.categories.edite',compact('rows'));
    }
    public function update(Request $request,$id){
        $requestArray = $request->all();
        if($request->hasFile('image')){
            $fileName = $this->uploadImage($request);
            $requestArray = ['image' => $fileName] + $requestArray;
        }
        $row = Category::FindOrFail($id);
        $row->update($requestArray);
        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        Category::FindOrFail($id)->delete();
        return redirect()->route('categories.index');
    }

    protected function uploadImage($request){
        $file = $request->file('image');
        $fileName = time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('uploads') , $fileName);
        return $fileName;
    }
}
