@extends('master')
@section('script')
<script src="http://192.168.0.56:3000/socket.io/socket.io.js"></script>
<script type="text/javascript">
  var listCheckpoints = JSON.stringify(<?php echo ($pathCheckPoints); ?>);
</script>
<script src="/js/base/map.js"></script>
<script src="/modules/quanlyxeravao/car-tracking-master.js">

</script>
@stop
@section('style')
<style media="screen">
  .bottom-sheet{
    position: fixed;
    bottom: 0;
    width: 80vw;
    height:40vh;
    overflow: auto;
    background: #fff;
  }
  .bottom-sheet{
    transform: translateY(100%);
    transition: 0.2s all ease;
    border:1px solid #ddd;
  }
  .bottom-sheet.open{
    transform: translate(0);
    transition: 0.3s all ease;
  }

</style>
@stop
@section('content')
<!-- Main content -->
<section class="content" style="padding:0;">
  <div id="car-tracker"></div>
  <!-- MAP & BOX PANE -->
  <div class="box box-success" style="border-radius:0;">
    <div class="box-header with-border">
      <h3 class="box-title">Theo dõi xe theo thời gian thực</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" id="toggle-bottom-sheet"><i class="fa fa-eye"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <div id="map" style="height:85vh;"></div>
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</section>
<!-- /.content -->
<section>
  <div class="bottom-sheet open">

    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#home">Thông tin xe</a></li>
      <li><a data-toggle="tab" href="#menu1">Checkpoints</a></li>
    </ul>

    <div class="tab-content">
      <div id="home" class="tab-pane fade in active">
        <div>
          <table class="table table-bordered">
            <thead>
              <tr style="background:#000;color:#fff;">
                <th>#</th>
                <th>Xe(10)</th>
                <th>Nhà cân (8 xe đang check)</th>
                <th>Bãi phế (2 xe đang check)</th>
                <th>Kho (0)</th>
              </tr>
            </thead>
            <tbody>
              <tr class="danger">
                <td>1</td>
                <td>16M4 8033</td>
                <td>chưa sẵn sàng</td>
                <td>chưa sẵn sàng</td>
                <td>chưa sẵn sàng</td>
              </tr>

              <tr class="info">
                <td>2</td>
                <td>16M4 8034</td>
                <td>checked(5 phút)</td>
                <td>checking(2phut)</td>
                <td>chưa sẵn sàng</td>
              </tr>

              <tr class="success">
                <td>3</td>
                <td>16M4 8035</td>
                <td>checked(10phút)</td>
                <td>checking(5 phút)</td>
                <td>chưa sẵn sàng</td>
              </tr>

              <tr class="danger">
                <td>1</td>
                <td>16M4 8033</td>
                <td>chưa sẵn sàng</td>
                <td>chưa sẵn sàng</td>
                <td>chưa sẵn sàng</td>
              </tr>

              <tr class="info">
                <td>2</td>
                <td>16M4 8034</td>
                <td>checked(5 phút)</td>
                <td>checking(2phut)</td>
                <td>chưa sẵn sàng</td>
              </tr>

              <tr class="success">
                <td>3</td>
                <td>16M4 8035</td>
                <td>checked(10phút)</td>
                <td>checking(5 phút)</td>
                <td>chưa sẵn sàng</td>
              </tr>

              <tr class="danger">
                <td>1</td>
                <td>16M4 8033</td>
                <td>chưa sẵn sàng</td>
                <td>chưa sẵn sàng</td>
                <td>chưa sẵn sàng</td>
              </tr>

              <tr class="info">
                <td>2</td>
                <td>16M4 8034</td>
                <td>checked(5 phút)</td>
                <td>checking(2phut)</td>
                <td>chưa sẵn sàng</td>
              </tr>

              <tr class="success">
                <td>3</td>
                <td>16M4 8035</td>
                <td>checked(10phút)</td>
                <td>checking(5 phút)</td>
                <td>chưa sẵn sàng</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div id="menu1" class="tab-pane fade">

      </div>
    </div>
  </div>
</section>
@stop
