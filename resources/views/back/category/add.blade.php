@extends('back.templates.master')

@section('title','Thêm category')

@section('heading','Thêm danh mục tin tức')

@section('content')
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header" align="right">
            <a href="{{url('/admin/category/list')}}" title="back">
                <button style="width:10%;" type="button" class="btn btn-block btn-danger">Quay lại</button>
            </a>
        </div>
        <form role="form" action="{{url('/admin/category/add')}}" method="post">
            {!! csrf_field() !!}
            <div class="card-body">
                <div class="form-group">
                    <label for="">Trạng thái: </label>
                    <select name="status">
                        <option value="1" selected>Bật</option>
                        <option value="0">Tắt</option> 
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên danh mục <span style="color:red;">*</span></label>
                    <input type="text" name="name" class="form-control" id="title" onkeyup="changeToSlug()">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Đường dẫn <span style="color:red;">*</span></label>
                    <input type="text" name="alias" class="form-control" id="slug">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nhóm danh mục </label>
                    <input type="text" name="group" class="form-control" id="exampleInputEmail1">
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
        </form>
    </div>
</div>
@stop