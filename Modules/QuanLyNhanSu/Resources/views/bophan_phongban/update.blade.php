@extends('master')
@section('content')
<section class="content-header">
  <h1>
    Quản lý phòng ban
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Quản Lý Nhân Sự</a></li>
    <li class="active">Quản lý phòng ban</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        @include('alert_error',['title'=>'Bộ phận - phòng ban'])
        <div class="box-body list-items">
          <ul class="nav navbar-nav nav-custom">
            <li data-toggle="modal" data-target="#add-new-position"><a href="javascript:void(0);" data-toggle="tooltip"  title="Tạo mới"><i class="fa fa-plus" aria-hidden="true"></i></a></li>
            <li><a href="javascript:void(0);" class="delete-items" data-toggle="tooltip" title="Xóa"><i class="fa fa-minus-square-o" aria-hidden="true"></i></a></li>
          </ul>
          <span class="clearfix"></span>
          

        </div>
        <!-- /.box-body -->
      </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
@stop
