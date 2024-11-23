
<!-- Main Sidebar -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('user.dashboard') }}" class="brand-link">
    <img src="{{ asset('lte/dist/img/logobk.png') }}" alt="Logo BK" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">BK-SahabatSiswa</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        @if ( Auth::user()->photo )
          <img src="{{ asset('storage/' . Auth::user()->photo) }}" class="img-circle elevation-2" alt="User Image" style="height: 35px; width: 35px; object-fit: cover; object-position: center;">
        @else 
          <img src="{{ asset('lte/dist/img/profil1.png') }}" class="img-circle elevation-2" alt="User Image" style="height: 35px; width: 35px; object-fit: cover; object-position: center;">
        @endif
      </div>

      <div class="info">

        @if ( Auth::user()->level == 'Siswa' && Auth::user()->siswa !== null)
          <a href="{{ route('user.profil') }}" class="d-block text-truncate">
            {{ Auth::user()->nama_lengkap }}
          </a>

        @elseif (Auth::user()->level == 'Guru' && Auth::user()->guru !== null)
          <a href="{{ route('user.profil') }}" class="d-block text-truncate">
            {{ Auth::user()->nama_lengkap }}
          </a>

        @elseif (Auth::user()->level == 'Admin')
          <a style="pointer-events: none;" class="d-block text-truncate">
            {{ Auth::user()->nama_lengkap }}
          </a>

        @else
          <a href="{{ route('user.profil') }}">
            Profil
          </a>

        @endif

      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

            @if (Auth::user()->level != 'Admin')
            <li class="nav-item">
              <a href="{{ route('user.dashboard') }}" class="nav-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-suit-diamond-fill" viewBox="0 0 16 16">
                  <path d="M2.45 7.4 7.2 1.067a1 1 0 0 1 1.6 0L13.55 7.4a1 1 0 0 1 0 1.2L8.8 14.933a1 1 0 0 1-1.6 0L2.45 8.6a1 1 0 0 1 0-1.2"/>
                </svg> <i class="ml-1"></i>
                <p>Dashboard</p>
              </a>
            </li>
            @endif
            
            @can('view_dashboard')
            <li class="nav-item">
              <a href="{{ route('user.dataAdmin') }}" class="nav-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-suit-diamond-fill" viewBox="0 0 16 16">
                  <path d="M2.45 7.4 7.2 1.067a1 1 0 0 1 1.6 0L13.55 7.4a1 1 0 0 1 0 1.2L8.8 14.933a1 1 0 0 1-1.6 0L2.45 8.6a1 1 0 0 1 0-1.2"/>
                </svg> <i class="ml-1"></i>
                <p>Admin</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('user.dataGuru') }}" class="nav-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-suit-diamond-fill" viewBox="0 0 16 16">
                  <path d="M2.45 7.4 7.2 1.067a1 1 0 0 1 1.6 0L13.55 7.4a1 1 0 0 1 0 1.2L8.8 14.933a1 1 0 0 1-1.6 0L2.45 8.6a1 1 0 0 1 0-1.2"/>
                </svg> <i class="ml-1"></i>
                <p>Guru</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('user.dataSiswa') }}" class="nav-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-suit-diamond-fill" viewBox="0 0 16 16">
                  <path d="M2.45 7.4 7.2 1.067a1 1 0 0 1 1.6 0L13.55 7.4a1 1 0 0 1 0 1.2L8.8 14.933a1 1 0 0 1-1.6 0L2.45 8.6a1 1 0 0 1 0-1.2"/>
                </svg> <i class="ml-1"></i>
                <p>Siswa</p>
              </a>
            </li>
            @endcan

            @can('view_card')
            <li class="nav-item">
              <a href="{{ route('user.guru') }}" class="nav-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-suit-diamond-fill" viewBox="0 0 16 16">
                  <path d="M2.45 7.4 7.2 1.067a1 1 0 0 1 1.6 0L13.55 7.4a1 1 0 0 1 0 1.2L8.8 14.933a1 1 0 0 1-1.6 0L2.45 8.6a1 1 0 0 1 0-1.2"/>
                </svg> <i class="ml-1"></i>
                <p>Kontak Guru BK</p>
              </a>
            </li>
            @endcan
  
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

