@extends('back.templates.master')

@section('title', 'Quản lý Trang')
@section('heading', 'Danh sách các Trang')
@section('page','active')

@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header bg-warning">
            <h3 class="card-title">Pages</h3>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr style="text-align: center;">
                        <th>STT</th>
                        <th>Tên trang</th>
                        <th>Trạng thái</th>
                        <th>Sắp xếp</th>
                        <th><i class="fas fa-wrench"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($page) && count($page) > 0)
                    @foreach($page as $key => $value)
                    <tr>
                        <td style="text-align: center;">{{$key+1}}</td>
                        <td>{{$value->Name}}</td>
                        @if($value->Status == 1)
                        <td style="text-align: center;color: green;">
                            <i class="fas fa-check"></i>
                        </td>
                        @elseif($value->Status == 0)
                        <td style="text-align: center;color: red;">
                            <i class="fas fa-power-off"></i>
                        </td>
                        @endif
                        <td style="text-align: center;">{{$value->Sort}}</td>
                        <td style="text-align: center;">
                            <a href="{{url('/admin/page/edit/'.$value->RowID)}}" title="Chỉnh sửa">
                                <i class="fas fa-edit mr-3"></i>
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