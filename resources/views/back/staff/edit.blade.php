@extends('back.templates.master')

@section('title','Chỉnh sửa nhân viên')

@section('heading','Chỉnh sửa nhân viên')

@section('content')
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header" align="right">
            <a href="{{url('/admin/staff/list')}}" title="back">
                <button style="width:10%;" type="button" class="btn btn-block btn-danger">Quay lại</button>
            </a>
        </div>
        <form role="form" action="{{url('admin/staff/edit/'.$User->id)}}" method="post">
            {!! csrf_field() !!}
            <div class="card-body">
                <div class="form-group">
                    <label for="">Vai trò: </label>
                    <select name="level">
                        @if(isset($UserLevel) && count($UserLevel) > 0)
                        @foreach($UserLevel as $key => $value)
                        <option value="{{$value->id}}" @if($value->id == $User->level) selected @endif>
                            {{$value->name}}
                        </option>
                        @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Trạng thái: </label>
                    <select name="status">
                        <option value="1" @if($User->status == 1) selected @endif>Bật</option>
                        <option value="0" @if($User->status == 0) selected @endif>Tắt</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Name <span style="color:red;">*</span></label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                        placeholder="Enter name" value="{{$User->name}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email <span style="color:red">*</span></label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                        placeholder="Enter email" value="{{$User->email}}" disabled>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password <span style="color:red">*</span></label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                        placeholder="Password">
                    <p style="color: red; font-size: 14px;">Để trống nếu không muốn thay đổi password</p>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@stop