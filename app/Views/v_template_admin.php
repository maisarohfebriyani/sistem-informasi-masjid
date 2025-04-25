
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIMASJID | <?= $judul ?></title>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('AdminLTE3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('AdminLTE3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE3/plugins/fontawesome-free/css/all.min.css') ?>">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE3/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE3/dist/css/adminlte.min.css') ?>">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        
       

      
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
  <a class="nav-link" href="<?= base_url('login/logout') ?>">
    <i class="fas fa-sign-out-alt"></i> Logout
  </a>
</li>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-success elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('Admin') ?>" class="brand-link text-center">
      <i class="fas fa-mosque text-success fa-3x"></i>
      <h2><b>SIMASJID</b></h2>
    </a>

    <a class="brand-link text-center text-success">
      <b>Alexander Pierce</b>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                
        <li class="nav-item">
            <a href="<?= base_url('Admin') ?>" class="nav-link <?= $menu == 'dashboard' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>

        <li class="nav-item">
    <a href="<?= base_url('agenda'); ?>" class="nav-link <?= (isset($menu) && $menu == 'agenda') ? 'active' : ''; ?>">
        <i class="nav-icon fas fa-calendar-alt"></i>
        <p>Agenda</p>
    </a>
</li>



        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-clock"></i>
            <p>Waktu Sholat</p>
          </a>
        </li>

          <li class="nav-item <?= $menu == 'uang-kas' ? 'menu-open' : '' ?>">
            <a href="#" class="nav-link <?= $menu == 'uang-kas' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-money-bill-wave"></i>
              <p>
                Uang Kas Masjid
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="#" class="nav-link <?= $menu == 'kas-masuk' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon text-success"></i>
                  <p>Kas Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon text-danger"></i>
                  <p>Kas Keluar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rekap kas</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item <?= $menu == 'uang-kas' ? 'menu-open' : '' ?>">
            <a href="#" class="nav-link <?= $menu == 'uang-kas' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-hand-holding-heart"></i>
              <p>
                Uang Kas Sosial
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link <?= $menu == 'kas-masuk' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon text-success"></i>
                  <p>Kas Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon text-danger"></i>
                  <p>Kas Keluar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rekap kas</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-hand-holding-usd"></i>
              <p>
                Donasi Masuk
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User
              </p>
            </a>
          </li>
          <li class="nav-item<?<?= $menu == 'Setting' ? 'active' : '' ?>">
            <a href="<?= base_url('admin/setting')?> " class="nav-link">
              <i class=" nav-icon fas fa-cog"></i>
              <p>
              Setting
</p>
</a>
</li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= $judul ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">

        <?php
        if ($page) {
            echo view($page);
        }
        ?>

          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url('AdminLTE3/plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('AdminLTE3/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url('AdminLTE3/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('AdminLTE3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('AdminLTE3/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('AdminLTE3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('AdminLTE3/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?= base_url('AdminLTE3/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
<!-- Select2 -->
<link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
<script src="../../plugins/select2/js/select2.full.min.js"></script>
<link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- AdminLTE App -->
<script src="<?= base_url('AdminLTE3/dist/js/adminlte.min.js') ?>"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, 
      "paging": true,
      "lengthChange": true, 
      "autoWidth": false,
      
    })
    
  });
</script>
</body>
</html>
