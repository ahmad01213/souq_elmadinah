@extends('layouts.admin')
@section('content')
    <div class="card-body align-content-center" style="justify-content: space-around">
        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12 col-md-4"></div>
                <div class="col-sm-12 col-md-4"></div>
            </div>
            <div class="row">
                <div class="col-sm-12">

                    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid"
                           aria-describedby="example2_info">
                        <thead>
                        <tr role="row" align="center" bgcolor="#696969">
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                                إجراءات
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                                @if($rows[0]->published == "1")
                                    {{ "تعطيل"}}
                                @else
                                    {{ "نشر"}}
                                @endif

                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                                القسم
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                                القسم الفرعي
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                                الموقع
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                                الوصف
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                                العنوان
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                                id
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($rows as $row)
                            <tr role="row" class="odd" align="center">
                                <td align="center" tabindex="0" class="sorting_1"
                                    style="text-align: center;width: 200px;">
                                    <div class="container" style=" display: flex;justify-content:center;">
                                        <form action="{{ route('ads.destroy' , ['ad' => $row->id]) }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button type="submit" class="btn btn-danger order-delete"
                                                    style="margin-right: 10px; height: 40px; border-radius: 15px">
                                                حذف
                                            </button>
                                        </form>
                                        {{--                                        <a class="btn btn-danger order-delete" href="{{ route('categories.destroy', ['user'=>$row->id]) }}" id="2" style="margin-right: 10px; height: 40px; border-radius: 15px">--}}
                                        {{--                                            حذف--}}
                                        {{--                                        </a>--}}
                                        <a class="btn btn-primary order-delete"
                                           href="{{ route('ads.edit', ['ad'=>$row->id]) }}" id="2"
                                           style="height: 40px; border-radius: 15px">
                                            تعديل
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <form action="{{ route('ads.publish' , ['ad' => $row->id]) }}" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="published" value={{$stat}}>
                                        <button type="submit" class="btn btn-success order-delete"
                                                style="margin-right: 10px; height: 40px; border-radius: 15px">
                                            @if($rows[0]->published == "1")
                                                {{ "تعطيل"}}
                                            @else
                                                {{ "نشر"}}
                                            @endif
                                        </button>
                                    </form>
                                </td>
                                <td tabindex="0" class="sorting_1">{{$row->subCategory->cat->name}}</td>
                                <td tabindex="0" class="sorting_1">{{$row->subCategory->name}}</td>

                                <td tabindex="0" class="sorting_1"></td>
                                <td tabindex="0" class="sorting_1">{{($row->desc)}}</td>

                                <td tabindex="0" class="sorting_1">{{$row-> title}}</td>
                                <td tabindex="0" class="sorting_1">{{($row->id)+1}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
</script>
