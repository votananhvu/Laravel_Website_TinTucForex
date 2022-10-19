@extends('back.templates.master')

@section('title','Chỉnh sửa nhận tin khuyến mãi')

@section('heading','Chỉnh sửa nhận tin khuyến mãi')

@section('content')
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header" align="right">
            <a href="{{url('/admin/newsletter/list')}}" title="back">
                <button style="width:10%;" type="button" class="btn btn-block btn-danger">Quay lại</button>
            </a>
        </div>
        <form role="form" action="{{url('/admin/newsletter/edit/'.$newsletter->RowID)}}" method="post">
            {!! csrf_field() !!}
            <div class="card-body">
                <div class="form-group">
                    <label for="">Trạng thái: </label>
                    <select name="isviews">
                        <option value="1" @if($newsletter->IsViews != 0) selected @endif>Đã xem</option>
                        <option value="0" @if($newsletter->IsViews == 0) selected @endif>Chưa xem</option> 
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email đăng ký nhận tin khuyến mãi <span style="color:red;">*</span></label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="{{$newsletter->Email}}">
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