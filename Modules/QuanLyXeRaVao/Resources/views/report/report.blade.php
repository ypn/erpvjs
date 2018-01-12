@extends('master')
@section('script')
<script type="text/javascript"></script>
@stop
@section('content')
<section class="content-header">
  <h1>
    Nhật ký theo dõi
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Quản lý xe ra vào</a></li>
    <li class="active">Danh sách các phiên theo dõi</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        @if(Session::has('status'))
          @if(Session::get('status')===1)
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Thêm quy trình thành công!</h4>
            Bạn vừa thêm mới thành công quy trình <strong>{{Session::get('name')}}</strong>
          </div>
          @elseif(Session::get('status')===-1)
          <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-warning"></i> Tạo quy trình mới không thành công!</h4>
            Cần điền đầy đủ thông tin vào các trường có dấu *
          </div>
          @else
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Tạo quy trình không thành công!</h4>
            Mã lỗi: {{Session::get('code')}} (tên quy trình bạn nhập đã tồn tại)<br/>
            Liên hệ với người quản trị để biết thêm thông tin.
          </div>
          @endif
        @endif
        <div class="box-body">
          <ul class="nav navbar-nav nav-custom">
            <li><a href="javascript:void(0);" title="Tạo mới" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i></a></li>
            <li><a href="javascript:void(0);" title="Xóa"><i class="fa fa-minus-square-o" aria-hidden="true"></i></a></li>
          </ul>
          <div class="clearfix"></div>
          <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Xe</th>
                <th>Ngày theo dõi</th>
                <th>Chi tiết</th>
              </tr>
            </thead>
            <tbody>
              @foreach($list as $k=>$l)
              <tr>
                <td>{{$k++}}</td>
                <td>{{isset($l->bienso)?$l->bienso :''}}</td>
                <td>{{date('d/m/Y',strtotime($l->created_at))}}</td>
                <td><a href="javascript:void(0);">chi tiết</a></td>
              </tr>
              @endforeach

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

<section>
  <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thêm quy trình mới</h4>
      </div>
      <form class="form-horizontal" method="POST" action="/{{Module::find('QuanLyQuyTrinh')->getLowerName()}}/quan-ly-quy-trinh/create">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="modal-body">
        <div class="form-group">
            <label class="control-label col-sm-3" for="name">Tên quy trình *</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="name" placeholder="Nhập tên quy trình">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="pwd">Diễn giải:</label>
            <div class="col-sm-9">
              <textarea class="form-control" name="desc"></textarea>
            </div>
          </div>
        </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy bỏ</button>
      </div>
    </div>
    </form>
  </div>
</div>
</section>

<section>
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
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
</section>
@stop
