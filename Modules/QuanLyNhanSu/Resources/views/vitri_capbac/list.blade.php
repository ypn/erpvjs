@extends('master')
@section('script')
<script type="text/javascript">
  $('.delete-items').on('click',function(){
    var items = [];

    $('.list-items input:checkbox:checked').map(function(){
      items.push($(this).val());
    });

    $.ajax({
        url:window.location.origin + '/quanlynhansu/vitri-capbac/destroy',
        method:'POST',
        data:{
          _token:'<?php echo csrf_token(); ?>',
          items:items
        },
        success:function(response){
          console.log(response);
          window.location.reload();
        }
    })
  });
</script>
@stop
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
        @include('alert_error',['title'=>'vị trí cấp bậc'])
        <div class="box-body list-items">
          <ul class="nav navbar-nav nav-custom">
            <li><a href="javascript:void(0);" data-toggle="modal" data-target="#add-new-position" title="Tạo mới"><i class="fa fa-plus" aria-hidden="true"></i></a></li>
            <li><a href="javascript:void(0);" class="delete-items" data-toggle="tooltip" title="Xóa"><i class="fa fa-minus-square-o" aria-hidden="true"></i></a></li>
          </ul>
          <span class="clearfix"></span>
          <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Tên vị trí</th>
                <th>Tên viết tắt</th>
                <th>Diễn giải</th>
              </tr>
            </thead>
            <tbody>
              @if(empty($list->toArray()))
              <tr>
                <td colspan="4" style="text-align:center;">Chưa có vị trí. click + để thêm mới</td>
              </tr>
              @else
              @foreach($list as $l)
              <tr>
                <td><input class="id-item" type="checkbox" value="{{$l->id}}"></td>
                <td>{{$l->ten}}</td>
                <td>{{$l->ten_viet_tat}}</td>
                <td>{{$l->diengiai}}</td>
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
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thêm mới vị trí - cấp bậc</h4>
      </div>
        <form class="form-horizontal" method="POST" action="/{{Module::find('QuanLyNhanSu')->getLowerName()}}/vitri-capbac/create">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label col-sm-2" for="email">Tên vị trí</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="ten" placeholder="Nhập tên vị trí">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="ten_viet_tat">Tên viết tắt</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="ten_viet_tat" placeholder="Nhập tên viết tắt của vị trí">
            </div>
          </div>
          <div class="form-group">

              <label class="control-label col-sm-2" for="ten_viet_tat">Diễn giải</label>
              <div class="col-sm-10">
                <textarea name="diengiai" class="form-control" placeholder="Diễn giải ngắn gọn chức năng, nhiệm vụ của vị trí này"></textarea>
              </div>

          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">Submit</button>
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
