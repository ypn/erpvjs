@extends('master')
@section('content')
<section class="content-header">
  <h1>
    {{$title}}
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Quản lý phân quyền</a></li>
    <li class="active">Nhóm người dùng</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        @include('alert_error',['title'=>'nhóm người dùng'])
        <div class="box-body list-items">
          <ul class="nav navbar-nav nav-custom">
            <li data-toggle="modal" data-target="#add-new-position"><a href="javascript:void(0);" data-toggle="tooltip"  title="Tạo mới"><i class="fa fa-plus" aria-hidden="true"></i></a></li>
            <li><a href="javascript:void(0);" class="delete-items" data-toggle="tooltip" title="Xóa"><i class="fa fa-minus-square-o" aria-hidden="true"></i></a></li>
          </ul>
          <span class="clearfix"></span>
          <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Nhóm người dùng</th>
                <th>Slug</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @if(empty($list->toArray()))
              <tr>
                <td colspan="5" style="text-align:center;">Chưa có nhóm người dùng nào được tạo. Click + để thêm nhóm người dùng mới!</td>
              </tr>
              @else
              @foreach($list as $l)
                <tr>
                  <td><input type="checkbox" class="id-item" value="{{$l->id}}"></td>
                  <td>{{$l->name}}</td>
                  <td>{{$l->slug}}</td>
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
  <!-- Modal -->
<div id="add-new-position" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thêm mới nhóm người dùng</h4>
      </div>
        <form class="form-horizontal" method="POST" action="/{{Module::find('QuanLyPhanQuyen')->getLowerName()}}/nhom-nguoi-dung/create">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label col-sm-3" for="ten">Tên nhóm người dùng</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="ten" placeholder="Nhập tên vị trí">
            </div>
          </div>
          <div class="form-group">
              <label class="control-label col-sm-3" for="diengiai">Diễn giải</label>
              <div class="col-sm-9">
                <textarea name="diengiai" class="form-control" placeholder="Diễn giải ngắn gọn chức năng, nhiệm vụ của bộ phận này"></textarea>
              </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="permission">Quyền</label>
            <div class="col-sm-9">

              <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Tên quyền</th>
                    <th>Alias</th>
                  </tr>
                </thead>
                <tbody>
                  @if(empty($lsPermissions->toArray()))
                  <tr>
                    <td colspan="3">Chưa có quyền nào. Thêm quyền trước</td>
                  </tr>
                  @else
                  @foreach($lsPermissions as $l)
                  <tr>
                    <td><input type="checkbox" value="{{$l->id}}" name="ids_permission[]" /></td>
                    <td>{{$l->ten}}</td>
                    <td>{{$l->alias}}</td>
                  </tr>
                  @endforeach
                  @endif
                </tbody>
              </table>
              </div>

            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
            </div>
          </div>
        </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>

  </div>
</div>
</section>

@stop
