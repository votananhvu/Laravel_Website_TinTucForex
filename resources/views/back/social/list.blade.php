@extends('back.templates.master')

@section('title', 'Quản lý mạng xã hội')
@section('heading', 'Quản lý mạng xã hội')
@section('social','active')

@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header bg-success">
            <h3 class="card-title">Social</h3>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr style="text-align: center;">
                        <th>STT</th>
                        <th>Tên mạng xã hội</th>
                        <th>Trạng thái</th>
                        <th>Sắp xếp</th>
                        <th><i class="fas fa-wrench"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($social) && count($social) > 0)
                    @foreach($social as $key => $value)
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
                            <a href="{{url('/admin/social/edit/'.$value->RowID)}}" title="Chỉnh sửa">
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