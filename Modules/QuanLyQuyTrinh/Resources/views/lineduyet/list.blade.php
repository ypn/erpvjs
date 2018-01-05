@extends('master')
@section('content')
<section class="content-header">
  <h1>
    Danh sách line duyệt
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Quản lý quy trình</a></li>
    <li class="active">danh sách line duyệt</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-body">
          <ul class="nav navbar-nav nav-custom">
            <li><a href="/quanlynhansu/nhansu/add" data-toggle="tooltip"  title="Tạo mới"><i class="fa fa-plus" aria-hidden="true"></i></a></li>
            <li><a href="javascript:void(0);" class="delete-items" data-toggle="tooltip" title="Xóa"><i class="fa fa-minus-square-o" aria-hidden="true"></i></a></li>
          </ul>
          <span class="clearfix"></span>
          <div class="table-responsive">
            <table class="table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Tên line duyệt</th>
                <th>Quy trình</th>
                <th>Diễn giải</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                @if(empty($list->toArray()))
                <tr>
                  <td colspan="5">Chưa có line duyệt nào. click + để thêm mới.</td>
                </tr>
                @else
                @foreach($list as $l)
                <tr>
                  <td><input type="checkbox" class="id-item" value=""></td>
                  <td>{{$l->ten}}</td>
                  <td>{{$l->tenquytrinh}}</td>
                  <td>{{$l->mota}}</td>
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
      </div>
    </div>
  </div>
</section>
@stop
