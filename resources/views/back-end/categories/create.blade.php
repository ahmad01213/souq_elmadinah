@extends('layouts.admin')
@section('content')
    <div class="card card-primary col-7  text-right center" style="height: 300px ">
        <div class="card-header text-center">
             إضافة قسم رئيسي
        </div>
        <div class="card-body">
            <form action="{{route('categories.store')}}" autocomplete="off" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group" >
                    <label for="exampleInputEmail1">إسم القسم</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="اكتب إسم القسم ">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">اختر صورة للقسم</label>
                    <input type="file" name="image" placeholder="ااختر الايقونة">
                </div>
                <button type="submit" class="btn btn-primary">إضافة</button>
            </form>
    </div>
    </div>
@endsection
