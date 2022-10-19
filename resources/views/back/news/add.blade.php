@extends('back.templates.master')

@section('title','Thêm tin tức')

@section('heading','Thêm tin tức')

@section('content')
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header" align="right">
            <a href="{{url('/admin/news/list')}}" title="back">
                <button style="width:10%;" type="button" class="btn btn-block btn-danger">
                    <i class="fa-solid fa-circle-arrow-left"></i> Quay lại
                </button>
            </a>
        </div>
        <form role="form" action="{{url('/admin/news/add/')}}" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div class="card-body">
                <div class="form-group">
                    <label for="">Danh mục: </label>
                    <select name="category">
                        @if(isset($category) && count($category) > 0)
                        @foreach($category as $key=>$value)
                        <option value="{{$value->RowID}}">
                            {{$value->Name}}
                        </option>
                        @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên tin tức <span style="color:red;">*</span></label>
                    <input type="text" name="name" class="form-control" id="title" onkeyup="changeToSlug()">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Đường dẫn <span style="color:red;">*</span></label>
                    <input type="text" name="alias" class="form-control" id="slug">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Thẻ meta title </label>
                    <textarea class="form-control" name="meta_title" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Thẻ meta description </label>
                    <textarea class="form-control" name="meta_description" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Thẻ meta keyword </label>
                    <textarea class="form-control" name="meta_keyword" rows="2"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Giới thiệu ngắn </label>
                    <textarea class="form-control" name="small_description" rows="7"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Ảnh đại diện</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile"></label>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Mô tả tin tức <span style="color:red;">*</span></label>
                    <textarea class="form-control" id="ckeditor" name="description" rows="10"></textarea>
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