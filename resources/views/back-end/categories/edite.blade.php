@extends('layouts.admin')
@section('content')
    <div class="card card-primary col-7  text-right center" style="height: 300px ">
        <div class="card-body">
            <form action="{{route('categories.update',['category'=>$rows->id])}}" autocomplete="off" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group" >
                    <label for="exampleInputEmail1">إسم القسم</label>
                    <input type="text" name="name" class="form-control" value="{{$rows->name}}" id="exampleInputEmail1" placeholder="اكتب إسم القسم ">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">اختر صورة للقسم</label>
                    <input type="file" name="image" value="{{}}" placeholder="ااختر الايقونة">
                </div>
                <button type="submit" class="btn btn-primary">حقظ</button>
            </form>
        </div>
    </div>
@endsection
