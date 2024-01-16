<!DOCTYPE html> <html lang="en"> <head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">

<title>Work with DB</title>
<!-- Theme style -->
<style>
  <?php include base_path('vendor/almasaeed2010/adminlte/dist/css/adminlte.min.css');
  ?>
</style>
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a class="brand-link">
        <span class="brand-text font-weight-light">Work with DB</span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview menu-open">
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="http://localhost:5000/" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Main</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="http://localhost:5000/student/create" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add student</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="http://localhost:5000/student/show_for_delete" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Delete student</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="http://localhost:5000/group/show" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Show all groups</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="http://localhost:5000/course/showCourse" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Show all courses</p>
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
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          @yield('content')
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- Main Footer -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.0.0-rc.1
      </div>
    </footer>
  </div>
  <!-- ./wrapper -->
</body>

</html>