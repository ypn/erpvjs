  <aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Phạm Như Ý</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Danh mục quản lý</li>
      <li>
        <a href="/">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-shopping-cart" aria-hidden="true"></i>
          <span>Quản lý mua </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/muahang/danh-sach-phieu-nhu-cau"><i class="fa fa-circle-o"></i> Danh sách mua</a></li>
          <li><a href="/muahang/tao-nhu-cau-mua"><i class="fa fa-circle-o"></i> Tạo mới</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-users" aria-hidden="true"></i>
          <span>Quản lý nhận sự </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/{{Module::find('QuanLyNhanSu')->getLowerName()}}/vitri-capbac/list"><i class="fa fa-circle-o"></i> Vị trí / cấp bậc</a></li>
          <li><a href="/{{Module::find('QuanLyNhanSu')->getLowerName()}}/bophan-phongban/list"><i class="fa fa-circle-o"></i> Danh sách bộ phận - phòng ban</a></li>
          <li><a href="/{{Module::find('QuanLyNhanSu')->getLowerName()}}/nhansu/list"><i class="fa fa-circle-o"></i> Danh sách nhân sự</a></li>
          <li><a href="/{{Module::find('QuanLyNhanSu')->getLowerName()}}/nhansu/add"><i class="fa fa-circle-o"></i> Thêm nhân sự</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-anchor" aria-hidden="true"></i>
        <span>Quản lý quy trình</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
        </a>

        <ul class="treeview-menu">
          <li><a href="/{{Module::find('QuanLyQuyTrinh')->getLowerName()}}/quan-ly-quy-trinh/list"><i class="fa fa-circle-o"></i> Danh sách quy trình</li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-circle-o"></i> <span>Quản lý line duyệt</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="/{{Module::find('QuanLyQuyTrinh')->getLowerName()}}/line-duyet/list"><i class="fa fa-circle-o"></i> Danh sách line duyệt</a></li>
              <li><a href="/quanlyquytrinh/line-duyet/add"><i class="fa fa-circle-o"></i> Khai báo line duyệt</a>
              </li>
            </ul>
          </li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-cubes" aria-hidden="true"></i>
        <span>Quản lý phân quyền</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
        </a>

        <ul class="treeview-menu">
          <li><a href="/{{Module::find('QuanLyPhanQuyen')->getLowerName()}}/quyen-nguoi-dung/list"><i class="fa fa-circle-o"></i> Danh sách quyền sử dụng</a></li>
          <li><a href="/{{Module::find('QuanLyPhanQuyen')->getLowerName()}}/nhom-nguoi-dung/list"><i class="fa fa-circle-o"></i> Danh sách nhóm người dùng</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-database" aria-hidden="true"></i>
        <span>Quản lý vật tư</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
        </a>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-truck" aria-hidden="true"></i>
        <span>Quản lý xe ra vào</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
        </a>

        <ul class="treeview-menu">
          <li><a href="/quanlyxeravao"><i class="fa fa-circle-o"></i> Theo dõi theo thời gian thực</a></li>
          <li><a href="/quanlyxeravao/checkpoints/list"><i class="fa fa-circle-o"></i> Trạm theo dõi</a></li>
          <li><a href="/quanlyxeravao/report"><i class="fa fa-circle-o"></i> Xem báo cáo</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-laptop"></i>
          <span>Hệ thống </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/{{Module::find('Hethong')->getLowerName()}}/quan-ly-quy-trinh/list"><i class="fa fa-circle-o"></i> Quản lý quy trình</a></li>
          <li><a href="/{{Module::find('Hethong')->getLowerName()}}/line-duyet/list"><i class="fa fa-circle-o"></i> Line duyệt</a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
