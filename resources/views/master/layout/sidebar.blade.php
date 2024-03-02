  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="/lte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        {{-- <div class="image">
          <img src="/lte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> --}}
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ url ('/admin')}}" class="nav-link {{ Request::is('admin') ? 'active' : '' }}">
              <i class="nav-icon far fa-image"></i>
              <p>
                User
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url ('/admin/alumni')}}" class="nav-link {{ Request::is('admin/alumni*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Alumni
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url ('/admin/chart')}}" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Charts
              </p>
            </a>
          </li>
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
        </ul>
      </nav>

      @auth
          @if(auth()->user()->role == 'User')
              <div class="nav-item">
                  <form class="w-100" action="/logout" method="post">
                      @csrf
                      <button class="nav-link" type="submit" style="color:white; background:transparent">Logout</button>
                  </form>
              </div>
          @endif
      @endauth
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>