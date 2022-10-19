@extends('back.templates.master')

@section('title', 'Cấu hình hệ thống')
@section('heading', 'Cấu hình hệ thống')
@section('system','active')

@section('content')

<div class="col-md-12">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">System</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{url('admin/system')}}" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Mô tả website <span style="color:red;">*</span></label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{$name->Description}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Logo</label>
                    <img src="{{url('public/images/logo/'.$logo->Description)}}" alt="" style="width:10%;">
                    {{$logo->Description}}
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="logo" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Favicon</label>
                    <img src="{{url('public/images/favicon/'.$favicon->Description)}}" alt="" style="width:10%;">
                    {{$favicon->Description}}
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="favicon" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email <span style="color:red">*</span></label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                        placeholder="Enter email" value="{{$email->Description}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Phone <span style="color:red;">*</span></label>
                    <input type="text" name="phone" class="form-control" id="exampleInputEmail1" value="{{$phone->Description}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Facebook </label>
                    <input type="text" name="address" class="form-control" id="exampleInputEmail1" value="{{$address->Description}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Copyright <span style="color:red;">*</span></label>
                    <input type="text" name="copyright" class="form-control" id="exampleInputEmail1" value="{{$copyright->Description}}">
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-info">Chỉnh sửa</button>
            </div>
        </form>
    </div>
</div>

@stop
