@extends('master')
@section('style')
<style media="screen">
  .nav-custom{
    padding-right:15px;
  }
  textarea {
     resize: vertical;
  }
</style>
@stop
@section('content')
<section class="content-header">
  <h1>
    {{$title}}
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Hệ thống</a></li>
    <li class="active">Line duyệt</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-body">
          <ul class="nav navbar-nav nav-custom">
            <li><a href="javascript:void(0);" data-toggle="modal" data-target="#myModal" data-toggle="tooltip" title="Tạo mới"><i class="fa fa-plus" aria-hidden="true"></i></a></li>
            <li><a href="#" data-toggle="tooltip" title="Xóa"><i class="fa fa-minus-square-o" aria-hidden="true"></i></a></li>
          </ul>

        </div>
        <!-- /.box-body -->
      </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thêm mới line duyệt</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="/action_page.php">
          <div class="form-group">
            <label class="control-label col-sm-3" for="email">Chọn Quy trình</label>
            <div class="col-sm-9">
              @if(empty($lsQuytrinh->toArray()))
              Chưa có quy trình! Click <a href="#">Tạo quy trình</a> để tạo mới quy trình.
              @else
              <select class="form-control" >
                <option disabled  selected="true">Chọn quy trình</option>
                @foreach($lsQuytrinh as $qt)
                <option value="{{$qt->id}}">{{$qt->ten}}</option>
                @endforeach
              </select>
              @endif
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="email">Tên line duyệt</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="pwd" placeholder="Nhập tên line duyệt">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="pwd">Diễn giải:</label>
            <div class="col-sm-9">
              <textarea placeholder="Diễn giải ngắn gọn" class="form-control"  /></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="pwd">Nhóm người duyệt:</label>
            <div class="col-sm-9">
              <div class="">
                <ul class="nav navbar-nav nav-custom">
                  <li><a href="javascript:void(0);"  data-toggle="modal" data-target="#myModal1" title="Thêm người duyệt"><i class="fa fa-plus" aria-hidden="true"></i></a></li>
                  <li><a href="#" data-toggle="tooltip" title="Xóa"><i class="fa fa-minus-square-o" aria-hidden="true"></i></a></li>
                </ul>
                <div id="myModal1" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="#myModal1">&times;</button>
                  <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                  <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
                <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width:30px;">#</th>
                    <th>Cấp người duyệt</th>
                    <th>Họ tên</th>
                    <th>Chức vụ</th>
                    <th style="width:48px;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td colspan="4" style="text-align:center;">Chưa có người duyệt nhấn + đê thêm mới</td>
                  </tr>
                  <tr>
                    <td>
                      <a><i class="glyphicon glyphicon-menu-up"></i></a>
                      <br>
                      <a><i class="glyphicon glyphicon-menu-down"></i></a>
                    </td>
                    <td>Nguoi duyet cap 1</td>
                    <td>Pham Nhu Y</td>
                    <td>Nhan vien</td>
                    <td><a href="#"><i class="fa fa-minus-square" aria-hidden="true"></i></a>  <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                  </tr>
                  <tr>
                    <td>
                      <a><i class="glyphicon glyphicon-menu-up"></i></a>
                      <br>
                      <a><i class="glyphicon glyphicon-menu-down"></i></a>
                    </td>
                    <td>Nguoi duyet cap 2</td>
                    <td>Pham Nhu Y</td>
                    <td>Nhan vien</td>
                    <td><a href="#"><i class="fa fa-minus-square" aria-hidden="true"></i></a>  <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                  </tr>
                  <tr>
                    <td>
                      <a><i class="glyphicon glyphicon-menu-up"></i></a>
                      <br>
                      <a><i class="glyphicon glyphicon-menu-down"></i></a>
                    </td>
                    <td>Nguoi duyet cap 3</td>
                    <td>Pham Nhu Y</td>
                    <td>Nhan vien</td>
                    <td><a href="#"><i class="fa fa-minus-square" aria-hidden="true"></i></a>  <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                  </tr>
                </tbody>
              </table>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
@stop
