@extends('back.templates.master')

@section('title','Đăng ký tài khoản')

@section('heading','Đăng ký tài khoản')

@section('content')
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header" align="right">
            <a href="{{url('/admin/staff/list')}}" title="back">
                <button style="width:10%;" type="button" class="btn btn-block btn-danger">Quay lại</button>
            </a>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{url('admin/staff/add')}}" method="post">
            {!! csrf_field() !!}
            <div class="card-body">
                <div class="form-group">
                    <label for="">Vai trò: </label>
                    <select name="level">
                        @if(isset($UserLevel) && count($UserLevel) > 0)
                        @foreach($UserLevel as $key=>$value)
                        <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Name <span style="color:red;">*</span></label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                        placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email <span style="color:red">*</span></label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                        placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password <span style="color:red">*</span></label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                        placeholder="Password">
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