@extends('master')
@section('content')
<section class="content-header">
  <h1>
    Danh sách mua
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Quản lý mua</a></li>
    <li class="active">Danh sách mua</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Danh sách nhu cầu mua</h3>

          <div class="box-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

              <div class="input-group-btn">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Tên bộ phận</th>
              <th>Phòng</th>
              <th>Mức độ</th>
              <th>Tên vật tư</th>
              <th>Diễn giải</th>
              <th>Số lượng</th>
              <th>Người lập</th>
              <th>Trạng thái</th>
              <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
              <tr class="default">
                <td>
                  Bộ phận IT
                </td>
                <td>Phòng KTCN</td>
                <td>Ưu tiên</td>
                <td>Máy in EPSON</td>
                <td>Mua máy in màu EPSON</td>
                <td>1</td>
                <td>Phạm Như Ý</td>
                <td>
                  khởi tạo
                </td>
                <td>
                  <a href="#">Xem</a>
                  |
                  <a href="#">Xóa</a>
                </td>
              </tr>

              <tr class="info">
                <td>
                  Bộ phận IT
                </td>
                <td>Phòng KTCN</td>
                <td>Bình thường</td>
                <td>Máy in EPSON</td>
                <td>Mua máy in màu EPSON</td>
                <td>2</td>
                <td>Phạm Như Ý</td>
                <td>
                  đang duyệt tại P.LO
                </td>
                <td>
                  <a href="#">Xem</a>
                  |
                  <a href="#">Xóa</a>
                </td>
              </tr>

              <tr class="danger">
                <td>
                  Bộ phận IT
                </td>
                <td>Phòng KTCN</td>
                <td>Bình thường</td>
                <td>Máy in EPSON</td>
                <td>Mua máy in màu EPSON</td>
                <td>3</td>
                <td>Phạm Như Ý</td>
                <td>
                  đang duyệt tại B.TGĐ
                </td>
                <td>
                  <a href="#">Xem</a>
                  |
                  <a href="#">Xóa</a>
                </td>
              </tr>

              <tr class="success">
                <td>
                  Bộ phận IT
                </td>
                <td>Phòng KTCN</td>
                <td>Bình thường</td>
                <td>Máy in EPSON</td>
                <td>Mua máy in màu EPSON</td>
                <td>4</td>
                <td>Phạm Như Ý</td>
                <td>
                  đã mua - đã nhập kho
                </td>
                <td>
                  <a href="#">Xem</a>
                  |
                  <a href="#">Xóa</a>
                </td>
              </tr>
            </tbody>
            <tfoot>
            <tr>
              <th>Tên bộ phận</th>
              <th>Phòng</th>
              <th>Mức độ</th>
              <th>Tên vật tư</th>
              <th>Diễn giải</th>
              <th>Số lượng</th>
              <th>Người lập</th>
              <th>Trạng thái</th>
              <th>Thao tác</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>

@stop
