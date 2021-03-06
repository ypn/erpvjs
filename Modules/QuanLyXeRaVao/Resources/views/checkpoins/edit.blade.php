@extends('master')
@section('script')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnYiPim3y8CmQ1_t8slDZTSLnhXk0II7Q"></script>
<script src="/modules/quanlyxeravao/getcheckpoints.js"></script>
@stop
@section('content')
<section class="content-header">
  <h1>
    Cập nhật trạm theo dõi
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Thêm trạm theo dõi mới</a></li>
    <li class="active">Vị trí - cấp bậc</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        @include('alert_error',['title'=>'checkpoint: ' . $checkpoint->name])
        <div class="box-body">

          <form class="form-horizontal" method="POST" action="/quanlyxeravao/checkpoints/update/{{$checkpoint->id}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label class="control-label col-sm-2">Tên checkpoin</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" value="{{isset($checkpoint->name) ? $checkpoint->name : ''}}" name="name" placeholder="Nhập tên checkpoint">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">Mô tả</label>
              <div class="col-sm-10">
                <textarea class="form-control" name="desc" placeholder="Mô tả checkpoin">{{isset($checkpoint->description) ? $checkpoint->description :''}}</textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2">Thời gian tối đa</label>
              <div class="col-sm-10">
                <div class="input-group">
                  <input value="{{isset($checkpoint->maxtime)?$checkpoint->maxtime:''}}" type="text" name="maxtime" class="form-control" placeholder="Nhập thời gian lưu lại của xe tối đa tại checkpoint này" aria-describedby="basic-addon1">
                  <span class="input-group-addon" id="basic-addon1">phút</span>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2">Vẽ checkpoint</label>
              <div class="col-sm-10">
                <ul class="nav navbar-nav nav-custom">
                  <li><a href="javascript:void(0);" id="clearmap" class="delete-items" data-toggle="tooltip" title="reset map"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                </ul>
                <div class="clearfix"></div>
                <input readonly type="text" name="checkpoints" class="form-control" value="{{isset($checkpoint->path) ? $checkpoint->path :''}}">
                <div id="map" style="height:500px;"></div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
              </div>
            </div>
          </form>

        </div>
        <!-- /.box-body -->
      </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<section class="hidden-section">

@stop
