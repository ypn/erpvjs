@extends('master')
@section('script')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnYiPim3y8CmQ1_t8slDZTSLnhXk0II7Q"></script>
<script src="http://113.160.215.214:3000/socket.io/socket.io.js"></script>
<script type="text/javascript">
  var listCheckpoints = JSON.stringify(<?php echo ($pathCheckPoints); ?>);
</script>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
</script>
<script src="/modules/quanlyxeravao/maplabel.js"></script>
<script src="/js/base/map.js"></script>
<script src="/modules/quanlyxeravao/car-tracking-master.js"></script>
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

  .bottom-sheet::-webkit-scrollbar {
      display: none;
  }
.nav.nav-tabs li a{
  border-radius: 0;
  margin: 0;
}

.nav.nav-tabs li.active a{
  border-top: 3px solid red;
}

.map-icon {
	font-size: 24px;
	color: red;
	line-height: 48px;
	text-align: center;
	white-space: nowrap;
}
</style>
@stop
@section('content')
<!-- Main content -->
<section class="content" style="padding:0;">
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
  <div class="bottom-sheet">
    <div class="toggle-bottom-sheet"></div>
    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#menu1">Xe đang theo dõi</a></li>
      <!-- <li><a data-toggle="tab" href="#home">Thông tin xe</a></li> -->
    </ul>
    <div class="tab-content">
      <div id="menu1" class="tab-pane fade  in active">
        <div id="react-root-car-tracker"></div>
      </div>
    </div>
  </div>
</section>
@stop
