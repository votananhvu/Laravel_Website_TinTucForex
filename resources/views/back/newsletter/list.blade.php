@extends('back.templates.master')

@section('title', 'Quản lý nhận tin khuyến mãi')
@section('heading', 'Danh sách nhận tin khuyến mãi')
@section('newsletter','active')

@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header bg-danger">
            <h3 class="card-title">List</h3>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr style="text-align: center;">
                        <th>STT</th>
                        <th>Email</th>
                        <th>Trạng thái</th>
                        <th><i class="fas fa-wrench"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($newsletter) && count($newsletter) > 0)
                    @foreach($newsletter as $key => $value)
                    <tr>
                        <td style="text-align: center;">{{$key+1}}</td>
                        <td>{{$value->Email}}</td>
                        @if($value->IsViews != 0)
                        <td style="text-align: center;color: green;">
                            <i class="fa-solid fa-eye"></i>
                        </td>
                        @else($value->IsViews == 0)
                        <td style="text-align: center;color: gray;">
                            <i class="fa-solid fa-eye-slash"></i>
                        </td>
                        @endif
                        <td style="text-align: center;">
                            <a href="{{url('/admin/newsletter/edit/'.$value->RowID)}}" title="Chỉnh sửa">
                                <i class="fas fa-edit mr-3"></i>
                            </a>
                            <a href="{{url('admin/newsletter/delete/'.$value->RowID)}}" title="Xóa" onclick="return confirm('Bạn có muốn xóa?')">
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