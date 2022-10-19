@extends('back.templates.master')

@section('title','Chỉnh sửa liên hệ')

@section('heading','Chỉnh sửa liên hệ')

@section('content')
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header" align="right">
            <a href="{{url('/admin/contact/list')}}" title="back">
                <button style="width:10%;" type="button" class="btn btn-block btn-danger">Quay lại</button>
            </a>
        </div>
        <form role="form" action="{{url('/admin/contact/edit/'.$contact->RowID)}}" method="post">
            {!! csrf_field() !!}
            <div class="card-body">
                <div class="form-group">
                    <label for="">Trạng thái: </label>
                    <select name="isviews">
                        <option value="1" @if($contact->IsViews != 0) selected @endif>Đã xem</option>
                        <option value="0" @if($contact->IsViews == 0) selected @endif>Chưa xem</option> 
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Họ tên khách hàng <span style="color:red;">*</span></label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{$contact->Name}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email <span style="color:red;">*</span></label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="{{$contact->Email}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Phone <span style="color:red;">*</span></label>
                    <input type="text" name="phone" class="form-control" id="exampleInputEmail1" value="{{$contact->Phone}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Lời nhắn <span style="color:red;">*</span></label>
                    <textarea name="message" class="form-control" rows="7">{{$contact->Message}}</textarea>
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