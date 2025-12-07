  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link d-flex align-items-center" style="padding-bottom: 3px;">

      <!-- Logo -->
      <img src="{{ asset('images/logo.jpg')}}" alt="logo" class="brand-image img-circle elevation-3 mr-2">

      <!-- Text -->
      <div class="brand-text font-weight-light" style="line-height: 1;">
          <span style="font-size: 22px; font-weight:600;">HMVC</span><br>
          <span style="font-size: 15px;">Laravel 10</span>
      </div>

    </a>


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('images/profile_pictures/' . Auth::user()->pp) }}" class="img-circle elevation-2" alt="{{Auth::user()->pp}}" width="300" height="300" style="border: 2px solid #fff; box-shadow: 0 0 5px rgba(0,0,0,0.2);">
        </div>
        <div class="info">
          <a href="{{url('profile/profile')}}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">MENU 1</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-area-chart"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-down"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ml-3">
                <a href="{{ url('admin/admin/view') }}" class="nav-link">
                  <i class="fas fa-area-chart"></i>
                  <p>Dashboard</p>
                </a>
              </li>
            </ul>
          </li>
      

          <li class="nav-header">MENU 2</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-solid fa-circle"></i>
              <p>
                Menu
                <i class="right fas fa-angle-down"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ml-3">
                <a href="{{ url('admin/admin/view') }}" class="nav-link">
                  <i class="fas fa-solid fa-circle"></i>
                  <p>Sub Menu</p>
                </a>
              </li>
            </ul>
          </li>
         
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
     
  </aside>
  