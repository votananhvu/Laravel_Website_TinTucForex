@extends('back.templates.master')

@section('title','Chỉnh sửa page')

@section('heading','Chỉnh sửa page')

@section('content')
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header" align="right">
            <a href="{{url('/admin/page/list')}}" title="back">
                <button style="width:10%;" type="button" class="btn btn-block btn-danger">Quay lại</button>
            </a>
        </div>
        <form role="form" action="{{url('/admin/page/edit/'.$page->RowID)}}" method="post">
            {!! csrf_field() !!}
            <div class="card-body">
                <div class="form-group">
                    <label for="">Trạng thái: </label>
                    <select name="status">
                        <option value="1" @if($page->Status == 1) selected @endif>Bật</option>
                        <option value="0" @if($page->Status == 0) selected @endif>Tắt</option> 
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Sắp xếp: </label>
                    <select name="sort">
                        @if(isset($sort_pages) && count($sort_pages) > 0)
                        @foreach($sort_pages as $p)
                        <option value="{{$p->Sort}}" @if($p->Sort == $page->Sort) selected @endif>
                            {{$p->Sort}}
                        </option>
                        @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên trang <span style="color:red;">*</span></label>
                    <input type="text" name="name" class="form-control" id="title" value="{{$page->Name}}" onkeyup="changeToSlug()">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Đường dẫn <span style="color:red;">*</span></label>
                    <input type="text" name="alias" class="form-control" id="slug" value="{{$page->Alias}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Font </label>
                    <input type="text" name="font" class="form-control" id="exampleInputEmail1" value="{{$page->Font}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Thẻ meta title </label>
                    <textarea class="form-control" name="meta_title" rows="3">{{$page->MetaTitle}}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Thẻ meta description </label>
                    <textarea class="form-control" name="meta_description" rows="5">{{$page->MetaDescription}}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Thẻ meta keyword </label>
                    <textarea class="form-control" name="meta_keyword" rows="2">{{$page->MetaKeyword}}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nội dung trang <span style="color:red;">*</span></label>
                    <textarea class="form-control" id="ckeditor" name="description" rows="10">{{$page->Description}}</textarea>
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