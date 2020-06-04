<?php

namespace App\Http\Controllers\BackEnd;
use App\Http\Controllers\Controller;
use App\Http\Requests\BackEnd\Users\Store;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends BackEndController
{
    public function index(){
        $rows = User::all();
        return view('back-end.users.index',compact('rows'));
    }
    public function create(){
        return view('back-end.users.create');
    }
    public function store(Request $request){
        $requestArray = $request->all();
        $requestArray['password'] =  Hash::make($requestArray['password']);
        User::create($requestArray);
        return redirect()->route('users.index');
    }

    public function edit($id){
        $rows = User::FindOrFail($id);
        return view('back-end.users.edite',compact('rows'));
    }
    public function update(Request $request,$id){
        $row = User::FindOrFail($id);
        $requestArray = $request->all();
        if(isset($requestArray['password']) && $requestArray['password'] != ""){
            $requestArray['password'] =  Hash::make($requestArray['password']);
        }else{
            unset($requestArray['password']);
        }
        $row->update($requestArray);
        return redirect()->route('users.index');
    }
    public function destroy($id)
    {
       User::FindOrFail($id)->delete();

        return redirect()->route('users.index');
    }
}
