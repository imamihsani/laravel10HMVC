<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HMVC | Pengguna</title>
  @include('admin::layouts.base')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div id="loading-overlay" class="loading-overlay">
    <div class="loading-text">Loading...</div>
</div>


<div class="wrapper" style="visibility:hidden;">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="
    padding-bottom: 0px;
    padding-left: 0px;
    padding-top: 0px;
    padding-right: 0px">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-sm-inline-block">
        <span class="nav-link text-dark" style="font-weight:bold;">HMVC Laravel 10</span>
      </li>
    </ul>

    
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
            <span class="badge badge-danger navbar-badge"></span>
        </a>

        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Notifikasi</span>
          <div class="dropdown-divider"></div>

            <a href="" class="dropdown-item">
              <i class="fas fa-tasks mr-2"></i>
              <span class="float-center text-muted text-sm">
              </span>
            </a>
         
        </div>
      </li>
      @include('admin::layouts.profileshortcut')
      
    </ul>
  </nav>
  <!-- /.navbar -->

  @include('admin::layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; <?=date('Y')?> <a href="https://www.instagram.com/imam.ihsan_/" target="igdev">IMX</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
  @stack('admin_scripts')
</body>
</html>
