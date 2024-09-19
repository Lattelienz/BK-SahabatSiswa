
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    {{-- <li class="nav-item d-none d-sm-inline-block">
      <a href="index3.html" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Contact</a>
    </li> --}}
    
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <form action="{{route('logout')}}" method="POST">
        @csrf
        <button type="submit" class="nav-link bg-transparent border-0" title="Logout">
          Logout &nbsp;
          <i class="fas fa-sign-out-alt"></i>
        </button>
      </form>
    </li>
    
    {{-- <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button" title="Chat">
        <i class="fas fa-comment-alt"></i>
      </a>
    </li> --}}
    
    <li class="nav-item d-none d-md-inline-block">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button" title="Full screen">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
  </ul>
</nav>