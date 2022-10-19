@extends('back.templates.master')

@section('title','Thông tin tài khoản')

@section('heading','Thông tin tài khoản')

@section('content')
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Account Info</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{url('admin/staff/profile')}}" method="post">
            {!! csrf_field() !!}
            <div class="card-body">
                <input type="hidden" name="id" value="{{Auth::user()->id}}">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name <span style="color:red;">*</span></label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter name" value="{{Auth::user()->name}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email <span style="color:red">*</span></label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{Auth::user()->email}}" disabled>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
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