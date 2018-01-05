@if(Session::has('status'))
  @if(Session::get('status')===1)
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i> Thêm {{$title}} thành công!</h4>
    Bạn vừa thêm mới thành công {{$title}} <strong>{{Session::get('name')}}</strong>
  </div>
  @elseif(Session::get('status')===-1)
  <div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-warning"></i> Tạo {{$title}} mới không thành công!</h4>
    Cần điền đầy đủ thông tin vào các trường có dấu *
  </div>
  @else
  <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-ban"></i> Tạo {{$title}} không thành công!</h4>
    Mã lỗi: {{Session::get('code')}} (tên {{$title}} bạn nhập đã tồn tại)<br/>
    Liên hệ với người quản trị để biết thêm thông tin.
  </div>
  @endif
@endif
