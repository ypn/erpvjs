@extends('master')
@section('content')
<section class="content-header">
  <h1>
    {{$title}}
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Quản Lý Nhân Sự</a></li>
    <li class="active">Vị trí - cấp bậc</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        @include('alert_error',['title'=>'Bộ phận - phòng ban'])
        <div class="box-body list-items">
          <ul class="nav navbar-nav nav-custom">
            <li><a href="/quanlyxeravao/checkpoint/add" data-toggle="tooltip"  title="Tạo mới"><i class="fa fa-plus" aria-hidden="true"></i></a></li>
            <li><a href="javascript:void(0);" class="delete-items" data-toggle="tooltip" title="Xóa"><i class="fa fa-minus-square-o" aria-hidden="true"></i></a></li>
          </ul>
          <span class="clearfix"></span>
          <div class="table-responsive">
            <table class="table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Họ và tên</th>
                <th>Tên hiển thị</th>
                <th>Phòng</th>
                <th>Chức vụ</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                @if(empty($list->toArray()))
                <tr>
                  <td colspan="6">Chưa có nhân sự nào. click + để thêm mới.</td>
                </tr>
                @else
                @foreach($list as $l)
                <tr>
                  <td><input type="checkbox" class="id-item" value=""></td>
                  <td>{{$l->first_name}} {{$l->last_name}}</td>
                  <td>{{$l->display_name}}</td>
                  <td>{{$l->bophan_phongban}}</td>
                  <td>{{$l->vitri_capbac}}</td>
                  <td>
                    <a href="#"><i class="fa fa-edit"></i></a>
                    <a href="#"><i class="fa fa-minus-square"></i></a>
                  </td>
                </tr>
                @endforeach
                @endif
            </tbody>
          </table>
          </div>
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
