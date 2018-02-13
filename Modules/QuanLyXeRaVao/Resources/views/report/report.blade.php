@extends('master')
@section('script')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCsu4u1E-u0aNt2mIAO1COEpz2-xq6JK2k"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="/modules/quanlyxeravao/report.js"></script>
<script type="text/javascript">
google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable(JSON.parse('<?php echo $chart_data; ?>'));

      var options = {
        chart: {
          title: 'Sơ đồ tổng quan xe tai các điểm theo dõi'
        }
      };

      var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

      chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script>
@stop
@section('style')
<style media="screen">
.modal-dialog {
width: 98%;
height: 92%;
padding: 0;
}

.modal-content {
height: 99%;
}
</style>
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
        <div id="columnchart_material" style="width: 100%; height: 300px;"></div>
    </div>
    <br><br>
    <div class="col-xs-12">
      <h4>Chi tiết</h4>
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
                <td><a data-sessionId="{{$l->id}}" href="#" class="load-detail-session" data-toggle="modal" data-target="#myModal">chi tiết</a></td>
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
          <h4 class="modal-title">Nhật ký di chuyển</h4>
        </div>
        <div class="modal-body" style="height:90%;">
          <div class="col-md-8" style="height:100%;">
            <div id="map-canvas" style="width:100%;height:100%;"></div>
          </div>

          <div class="col-md-4 time-report">
            <div class="report-general">
              <div class="created_at">
                <label>Bắt đầu:</label> <span class="sp_created_at"></span>
              </div>
              <div class="end_at">
                <label>Kết thúc:</label> <span class="sp_end_at"></span>
              </div>
              <div class="total_time">
                <label>Tổng thời gian:</label> <span class="sp_total_time"></span>
              </div>
            </div>
            <hr>
            <h5><label for="">Chi tiết:</label></h5>
            <table class="table table-bordered">
              <thead style="font-size:11px;">
                <tr>
                  <th>#</th>
                  <th>Quãng đường</th>
                  <th>Thời gian (min:sec)</th>
                  <th>Định mức (min)</th>
                  <th>Chênh lệch (min:sec)</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@stop
