@extends('back.templates.master')

@section('title','Danh sách nhân viên')

@section('heading','Quản lý nhân viên')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header bg-secondary">
            <a href="{{url('admin/staff/add')}}" title="Thêm mới">
                <button style="width:10%;" type="button" class="btn btn-block btn-success">+ Thêm</button>
            </a>
        </div>
        <div class="card-body">
        <table id="example1" class="table table-bordered table-hover">
            <thead>
                <tr style="text-align: center;">
                    <th>STT</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Vai trò</th>
                    <th>Trạng thái</th>
                    <th><i class="fas fa-wrench"></i></th>
                </tr>
            </thead>
            <tbody>
                @if(isset($User) && count($User) > 0)
                @foreach($User as $key => $value)
                <tr>
                    <td style="text-align: center;">{{$key+1}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->email}}</td>
                    @if($value->level == 1)
                    <td>Administrator</td>
                    @elseif($value->level == 2)
                    <td>Seo Content</td>
                    @endif

                    @if($value->status == 1)
                    <td style="text-align: center;color: green;">
                        <i class="fas fa-check"></i>
                    </td>
                    @elseif($value->status == 0)
                    <td style="text-align: center;color: red;">
                    <i class="fas fa-power-off"></i>
                    </td>
                    @endif
                    <td style="text-align: center;">
                        <a href="{{url('admin/staff/edit/'.$value->id)}}" title="Chỉnh sửa">
                            <i class="fas fa-edit mr-3"></i>
                        </a>
                        <a href="{{url('admin/staff/delete/'.$value->id)}}" title="Xóa" onclick="return confirm('Bạn có muốn xóa?')">
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