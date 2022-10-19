@extends('back.templates.master')

@section('title','Chỉnh sửa mạng xã hội')

@section('heading','Chỉnh mạng xã hội')

@section('content')
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header" align="right">
            <a href="{{url('/admin/social/list')}}" title="back">
                <button style="width:10%;" type="button" class="btn btn-block btn-danger">Quay lại</button>
            </a>
        </div>
        <form role="form" action="{{url('/admin/social/edit/'.$social->RowID)}}" method="post">
            {!! csrf_field() !!}
            <div class="card-body">
                <div class="form-group">
                    <label for="">Trạng thái: </label>
                    <select name="status">
                        <option value="1" @if($social->Status == 1) selected @endif>Bật</option>
                        <option value="0" @if($social->Status == 0) selected @endif>Tắt</option> 
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Sắp xếp: </label>
                    <select name="sort">
                        @if(isset($sort_social) && count($sort_social) > 0)
                        @foreach($sort_social as $s)
                        <option value="{{$s->Sort}}" @if($s->Sort == $social->Sort) selected @endif>
                            {{$s->Sort}}
                        </option>
                        @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên mạng xã hội <span style="color:red;">*</span></label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{$social->Name}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Font </label>
                    <input type="text" name="font" class="form-control" id="exampleInputEmail1" value="{{$social->Font}}">
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