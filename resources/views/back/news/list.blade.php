@extends('back.templates.master')

@section('title','Quản lý tin tức')

@section('heading','Danh sách tin tức')

@section('news','active')

@section('qltt','active')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header bg-secondary">
            <a href="{{url('/admin/news/add')}}" title="Thêm mới">
                <button style="width:10%;" type="button" class="btn btn-block btn-success">+ Thêm</button>
            </a>
        </div>
        <div class="card-body">
        <table id="example1" class="table table-bordered table-hover">
            <thead>
                <tr style="text-align: center;">
                    <th>STT</th>
                    <th>Tên tin tức</th>
                    <th>Danh mục</th>
                    <th>Trạng thái</th>
                    <th>Ảnh đại diện</th>
                    <th><i class="fas fa-wrench"></i></th>
                </tr>
            </thead>
            <tbody>
                @if(isset($news) && count($news) > 0)
                @foreach($news as $key => $value)
                <tr>
                    <td style="text-align: center;">{{$key+1}}</td>
                    <td>{{$value->Name}}</td>
                    <td>{{$value->CategoryName}}</td>
                    @if($value->Status == 1)
                    <td style="text-align: center;color: green;">
                        <i class="fas fa-check"></i>
                    </td>
                    @elseif($value->Status == 0)
                    <td style="text-align: center;color: red;">
                    <i class="fas fa-power-off"></i>
                    </td>
                    @endif
                    <td align="center">
                        <img width="80" height="60" src="{{url('public/images/news/'.$value->Image)}}" alt="Avatar">
                    </td>
                    <td style="text-align: center;">
                        <a href="{{url('admin/news/edit/'.$value->RowID)}}" title="Chỉnh sửa">
                            <i class="fas fa-edit mr-3"></i>
                        </a>
                        <a href="{{url('admin/news/delete/'.$value->RowID)}}" title="Xóa" onclick="return confirm('Bạn có muốn xóa?')">
                            <i class="fas fa-trash-alt" style="color:red;"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
    </div>
</div>
@stop