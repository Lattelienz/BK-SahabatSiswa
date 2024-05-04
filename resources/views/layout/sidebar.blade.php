
<!-- Main Sidebar -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('AdminLTE/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('AdminLTE/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{-- {{ route("admin.dashboard.guru.bk") }} --}}" class="nav-link {{-- {{ $active == 'bk' ? 'active' : '' }} --}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bimbingan Konseling</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route("admin.dashboard.admin") }}" class="nav-link {{-- {{ $active == 'admin' ? 'active' : '' }} --}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin</p>
                </a>
              </li>
              -- <li class="nav-item">
                <a href="{{-- {{ route("admin.dashboard.guru") }} --}}" class="nav-link {{-- {{ $active == 'guru' ? 'active' : '' }} --}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Guru</p>
                </a>
              </li> -->
            </ul>
          </li>
        </ul>
      </nav>>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>