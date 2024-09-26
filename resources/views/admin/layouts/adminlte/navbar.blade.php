<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}" style="cursor: pointer" onclick="event.preventDefault(); document.getElementById('logout').submit();" class="btn btn-danger">
          <i class="fas fa-power-off text-danger"></i>
        </a>
        <form action="{{ route('logout') }}" id="logout" method="POST" style="display: none;">
          @csrf
        </form>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->