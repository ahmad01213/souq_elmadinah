@extends('layouts.admin')
@section('content')
    <div class="card card-primary col-7  text-right center" style="height: 370px ">
        <div class="card-header text-center">
             إضافة فرع
        </div>
        <div class="card-body">
            <form action="{{route('subcategories.store')}}" autocomplete="off" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group" >
                    <label for="exampleInputEmail1">إسم الفرع</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="اكتب إسم الفرع ">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">اختر صورة للفرع</label>
                    <input type="file" name="image" placeholder="ااختر الايقونة">
                </div>
                <div class="form-group text-right">
                    <label>اختر القسم</label>
                    <select class="form-control " name="cate_id">
                        <option class="float-right">اختر القسم</option>
                    @foreach($rows as $row)
                            <option value="{{$row->id}}">{{$row->id}}</option>
                    @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">إضافة</button>
            </form>
    </div>
    </div>
@endsection
