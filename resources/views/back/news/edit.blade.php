@extends('back.templates.master')

@section('title','Chỉnh sửa tin tức')

@section('heading','Chỉnh sửa tin tức')

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
        <form role="form" action="{{url('/admin/news/edit/'.$news->RowID)}}" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div class="card-body">
                <div class="form-group">
                    <label for="">Trạng thái: </label>
                    <select name="status">
                        <option value="1" @if($news->Status == 1) selected @endif>Bật</option>
                        <option value="0" @if($news->Status == 0) selected @endif>Tắt</option> 
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Danh mục: </label>
                    <select name="category">
                        @if(isset($category) && count($category) > 0)
                        @foreach($category as $key=>$value)
                        <option value="{{$value->RowID}}" @if($value->RowID == $news->Category_ID) selected @endif>
                            {{$value->Name}}
                        </option>
                        @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên tin tức <span style="color:red;">*</span></label>
                    <input type="text" name="name" class="form-control" id="title" value="{{$news->Name}}" onkeyup="changeToSlug()">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Đường dẫn <span style="color:red;">*</span></label>
                    <input type="text" name="alias" class="form-control" id="slug" value="{{$news->Alias}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Thẻ meta title </label>
                    <textarea class="form-control" name="meta_title" rows="3">{{$news->MetaTitle}}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Thẻ meta description </label>
                    <textarea class="form-control" name="meta_description" rows="5">{{$news->MetaDescription}}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Thẻ meta keyword </label>
                    <textarea class="form-control" name="meta_keyword" rows="2">{{$news->MetaKeyword}}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Giới thiệu ngắn </label>
                    <textarea class="form-control" name="small_description" rows="7">{{$news->SmallDescription}}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Ảnh đại diện</label>
                    @if($news->Image != null)
                    <img src="{{url('public/images/news/'.$news->Image)}}" alt="" style="width:10%;">
                    @endif
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile"></label>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Mô tả tin tức <span style="color:red;">*</span></label>
                    <textarea class="form-control" id="ckeditor" name="description" rows="10">{{$news->Description}}</textarea>
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