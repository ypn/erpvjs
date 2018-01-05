@extends('master')
@section('script')
<script src="/modules/quanlyxeravao/getcheckpoints.js"></script>
@stop
@section('content')
<section class="content-header">
  <h1>
    {{$title}}
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Thêm checkpoin mới</a></li>
    <li class="active">Vị trí - cấp bậc</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        @include('alert_error',['title'=>'checkpoin'])
        <div class="box-body">

          <form class="form-horizontal" method="POST" action="/quanlyxeravao/checkpoints/create">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label class="control-label col-sm-2">Tên checkpoin</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="name" placeholder="Nhập tên checkpoint">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">Mô tả</label>
              <div class="col-sm-10">
                <textarea class="form-control" name="desc" placeholder="Mô tả checkpoin"></textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2">Thời gian tối đa</label>
              <div class="col-sm-10">
                <div class="input-group">
                  <input type="text" name="maxtime" class="form-control" placeholder="Nhập thời gian lưu lại của xe tối đa tại checkpoint này" aria-describedby="basic-addon1">
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
                <input readonly type="text" name="checkpoints" class="form-control">
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
