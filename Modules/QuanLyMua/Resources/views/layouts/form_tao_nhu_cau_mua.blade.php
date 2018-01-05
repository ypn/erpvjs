@extends('master')
@section('style')
<link rel='stylesheet prefetch' href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/ui-lightness/jquery-ui.css'>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<style media="screen">
textarea {
resize: vertical;
}
label {
    display: inline-block;
    width: 150px;
}
input[type="text"], input[type="password"] {
    display: inline-block;
    width: 200px;
}
label.error {
    display: inline-block;
    color:red;
    width: 200px;
    font-weight:normal;
}

table#demo-table th {
  background-color: #3c8dbc;
  color: #fff;
}
table#demo-table th,
table#demo-table td {
  white-space: nowrap;
  padding: 3px 6px;
}
table.cellpadding-0 td {
	padding: 0;
}
table.cellspacing-0 {
	border-spacing: 0;
	border-collapse: collapse;
}
/*table.bordered th,
table.bordered td {
  border: 1px solid #ccc;
  border-right: none;
  text-align: center;
}*/
table.bordered th:last,
table.bordered td:last {
  border-right: 1px solid #ccc;
}

td{
  outline: none;
}
td:focus{
  background: #fff;
}
.select2-container--default{
  width: 100%!important;
}
.select2-container--default .select2-selection--single{
  border-radius: 0;
}
.radio-inline{
  width:auto;
}
</style>
@stop
@section('script')
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="/js/base/table-master.js"></script>
<script src="/js/base/data_table.js"></script>
<script src="/js/muahang.js"></script>
@stop
@section('content')
<section class="content-header">
  <h1>
    Tạo mới nhu cầu mua
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Quản lý mua</a></li>
    <li class="active">Tạo mới</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">

        </div>
        <!-- /.box-header -->

        <div>
          <div class="form-horizontal">
            <div class="col-md-12">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label col-sm-4" for="email">Bộ phận:</label>
                  <div class="col-sm-8">
                    <select class="form-control js-example-basic-single input-sm" name="state">
                      <option value="AL">P-CBCC-Ban lãnh đạo</option>
                      <option value="WY">P-PNS-Phòng nhân sự</option>
                      <option value="">P-PNS-BP Nhân sự</option>
                      <option value="">P-PNS-Ban trợ lý, Thư kí</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-4" for="email">Người yêu cầu:</label>
                  <div class="col-sm-8">
                    <input type="email" class="form-control input-sm" id="email" placeholder="Nhập tên người yêu cầu">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-4">Mã giao dịch:</label>
                  <div class="col-sm-8">
                    <label class="radio-inline"><input type="radio" name="optradio">Nhu cầu</label>
                    <label class="radio-inline"><input type="radio" name="optradio">Sửa chữa</label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-4">Mức độ</label>
                  <div class="col-sm-8">
                    <select class="form-control input-sm" name="">
                      <option value="">bình thường</option>
                      <option value="">khẩn cấp</option>
                      <option value="">càng nhanh càng tốt</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-4">Bộ phận mua</label>
                  <div class="col-sm-8">
                    <input type="email" class="form-control input-sm" id="email" placeholder="Nhập tên bộ phận mua">
                  </div>
                </div>

              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label col-sm-4" for="email">Số phiếu yêu cầu:</label>
                  <div class="col-sm-8">
                    <input type="email" class="form-control input-sm" id="email" placeholder="Nhập số phiếu">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-4" for="email">Ngày lập:</label>
                  <div class="col-sm-8">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control input-sm pull-right" id="datepicker">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-4" for="email">Tỷ giá:</label>
                  <div class="col-sm-8">
                    <select class="form-control input-sm" name="">
                      <option value="">VNĐ</option>
                      <option value="">USD</option>
                      <option value="">JPY</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="box-body table-responsive table-wrapper">
          <!-- <table id="tb-them-nhu-cau" class="table table-bordered table-hover ">
            <thead>
            <tr>
              <th>Mã mặt hàng</th>
              <th>Tên mặt hàng</th>
              <th>Đvt</th>
              <th>Xuất xứ</th>
              <th>Thông số kĩ thuật</th>
              <th>Ngày y/c hàng về</th>
              <th>Mã NCC</th>
              <th>Tồn</th>
              <th>Thao tác</th>
              <th>Mã mặt hàng</th>
              <th>Tên mặt hàng</th>
              <th>Đvt</th>
              <th>Xuất xứ</th>
              <th>Thông số kĩ thuật</th>
              <th>Ngày y/c hàng về</th>
              <th>Mã NCC</th>
              <th>Tồn</th>
              <th>Thao tác</th>
            </tr>
            </thead>
            <tbody></tbody>
          </table> -->
          <!-- <table id="demo-table" class="table bordered table-bordered table-hover cellpadding-0 cellspacing-0 vjs-dynamic-table">
          	<thead>
          		<tr>
          			<th id='column-header-1'>Mã hàng<div id='column-header-1-sizer'></div></th>
          			<th id='column-header-2'>Tên mặt hàng<div id='column-header-2-sizer'></div></th>
          			<th id='column-header-3'>Đvt<div id='column-header-3-sizer'></div></th>
          			<th id='column-header-4'>Xuất xứ	<div id='column-header-4-sizer'></div></th>
          			<th id='column-header-5'>Thông số kĩ thuật<div id='column-header-5-sizer'></div></th>
          			<th id='column-header-6'>Tỉ lệ tiêu hao<div id='column-header-6-sizer'></div></th>
          			<th id='column-header-7'>Ngày YC hàng về<div id='column-header-7-sizer'></div></th>
          			<th id='column-header-8'>Mục đích/ lý do<div id='column-header-8-sizer'></div></th>
          			<th id='column-header-9'>Tồn<div id='column-header-9-sizer'></div></th>
          			<th id='column-header-10'>Số lượng<div id='column-header-10-sizer'></div></th>
          			<th id='column-header-11'>Giá<div id='column-header-11-sizer'></div></th>
          			<th id='column-header-12'>Tiền<div id='column-header-12-sizer'></div></th>
          			<th id='column-header-13'>Địa chỉ<div id='column-header-13-sizer'></div></th>
          			<th id='column-header-14'>Kho hàng<div id='column-header-14-sizer'></div></th>
          			<th id='column-header-15'>Mã ncc<div id='column-header-15-sizer'></div></th>
          			<th id='column-header-16'>PIC<div id='column-header-16-sizer'></div></th>
          			<th id='column-header-17'>Ghi chú<div id='column-header-17-sizer'></div></th>
          			<th id='column-header-18'>Sl TBP duyệt<div id='column-header-18-sizer'></div></th>
          			<th id='column-header-19'>Ghi chú cấp duyệt 1<div id='column-header-19-sizer'></div></th>
          			<th id='column-header-20'>Sl TP LO/HC duyệt<div id='column-header-20-sizer'></div></th>
          			<th id='column-header-21'>Ghi chú cấp duyệt 2<div id='column-header-21-sizer'></div></th>
          			<th id='column-header-22'>Sl TGĐ duyệt<div id='column-header-22-sizer'></div></th>
          			<th id='column-header-23'>Ghi chú cấp duyệt 3<div id='column-header-23-sizer'></div></th>
          			<th id='column-header-24'>Sl đặt hàng<div id='column-header-24-sizer'></div></th>
          			<th id='column-header-25'>Trạng thái<div id='column-header-25-sizer'></div></th>
                <th id='column-header-25'>Mã vụ việc<div id='column-header-24-sizer'></div></th>
          			<th id='column-header-26'>Hợp đồng<div id='column-header-25-sizer'></div></th>
          		</tr>
          	</thead>
          	<tbody>
              @for($i=0 ; $i<27;$i++)
          			<td contenteditable>data {{$i}}</td>
              @endfor
          	</tbody>
          </table> -->

          <div id="table-list-buy-item"></div>
        </div>
          <br>

        <div>
            <div class="modal fade" id="modal-add-new-item-buy" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Thêm mặt hàng mới</h4>
                </div>
                <div class="modal-body">

                  <form class="form-horizontal" id="form-mua-hang">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label col-sm-4" for="itmh_ma_hang">Mã hàng:</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control" id="itmh_ma_hang" name="itmh_ma_hang" placeholder="Nhập mã hàng">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label col-sm-4" for="itmh_ten_hang">Tên mặt hàng:</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control" id="itmh_ten_hang" name="itmh_ten_hang"  placeholder="Nhập tên hàng">
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label col-sm-4" for="itmh_dvt">Đvt:</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control" id="itmh_dtv" name="itmh_dtv" placeholder="Nhập Đvt">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label col-sm-4" for="itmh_xuat_xu">Xuất xứ:</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control" id="itmh_xuat_xu" placeholder="Xuất xứ">
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label col-sm-4" for="itmh_thong_so_ky_thuat">Thông số kĩ thuật:</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control" id="itmh_thong_so_ky_thuat" placeholder="Thông số kỹ thuật">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label col-sm-4" for="itmg_ngay_yc">Ngày y/c hàng về:</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control" id="itmh_ngay_yc" placeholder="Tỷ lệ tiêu hao">
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label col-sm-4" for="itmh_ncc">Mã nhà cung cấp</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control" id="itmh_ncc" placeholder="Mã ncc">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label col-sm-4" for="itmh_ton">Tồn</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control" id="itmh_ton" placeholder="Tồn">
                          </div>
                        </div>
                      </div>

                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-2" for="itmh_mucdich">Mục đích</label>
                      <div class="col-sm-10">
                        <textarea type="text" class="form-control" id="itmh_mucdich" placeholder="mục đích"></textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-2" for="itmh_ghichu">Ghi chú</label>
                      <div class="col-sm-10">
                        <textarea type="text" class="form-control" id="itmh_ghichu" placeholder="Ghi chú"></textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" id="btn-add-buy-item" class="btn btn-primary">Thêm mặt hàng</button>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
@stop
