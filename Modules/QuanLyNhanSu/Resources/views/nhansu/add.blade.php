@extends('master')
@section('content')
<section class="content-header">
  <h1>
    {{$title}}
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Quản Lý Nhân Sự</a></li>
    <li class="active">Thêm nhân sự</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        @include('alert_error',['title'=>'nhân sự mới'])
        <div class="box-body">
          <form class="form-horizontal"  method="POST" action="/quanlynhansu/nhansu/create">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <div class="form-group">
            <label class="control-label col-sm-2" for="ho">Họ</label>
            <div class="col-sm-10">
              <input type="input" class="form-control" name="ho" id="ho" placeholder="Nhập họ nhân viên">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="ten">Tên</label>
            <div class="col-sm-10">
              <input type="input" class="form-control" name="ten" id="ten" placeholder="Nhập tên nhân viên">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="ten_hien_thi">Tên hiển thị </label>
            <div class="col-sm-10">
              <input type="input" class="form-control" name="ten_hien_thi" id="ten_hien_thi" placeholder="Nhận tên hiển thị định dạng Tên TenPhongBan. Họ">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="email">Email </label>
            <div class="col-sm-10">
              <input type="email" class="form-control" name="email" id="email" placeholder="Nhập email">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="phong_ban">Phòng ban </label>
            @if(empty($lsPhongban->toArray()))
            <div class="col-sm-10">
              <span>Chưa có phòng ban nào được tạo.</span>
            </div>
            @else
            <div class="col-sm-10">
              <select class="form-control" name="phong_ban">
                @foreach($lsPhongban as $pb)
                <option value="{{$pb->id}}">{{$pb->ten}}</option>
                @endforeach
              </select>
            </div>
            @endif
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="position">Vị trí </label>
            @if(empty($lsVitri->toArray()))
            <div class="col-sm-10">
                <span>Chưa có vị trí nào được tạo.</span>
            </div>
            @else
            <div class="col-sm-10">
              <select class="form-control" name="position" id="position">
                @foreach($lsVitri as $vt)
                <option value="{{$vt->id}}">{{$vt->ten}}</option>
                @endforeach
              </select>
            </div>
            @endif
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
            </div>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</section>
@stop
