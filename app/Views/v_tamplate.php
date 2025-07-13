<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Masjid | <?= $judul ?></title>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE3/plugins/fontawesome-free/css/all.min.css') ?>">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE3/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE3/dist/css/adminlte.min.css') ?>">
</head>
<body class="hold-transition layout-top-nav">

<?php
$db = \Config\Database::connect();
$web = $db->table('tbl_setting')->get()->getRowArray();

if (!$web) {
    $web = ['nama_masjid' => 'Nama Masjid Belum Disetting'];
}
?>

<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="<?= base_url() ?>" class="navbar-brand">
        <i class="fas fa-mosque fa-2x text-green"></i><b> <?= $web['nama_masjid'] ?? 'Masjid' ?></b>
      </a>
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
          <ul class="navbar-nav">
            <li class="nav-item"><a href="<?= base_url('Home') ?>" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="<?= base_url('Home/Agenda') ?>" class="nav-link">Agenda</a></li>
            <li class="nav-item dropdown">
              <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" class="nav-link dropdown-toggle">Kas</a>
              <ul class="dropdown-menu border-0 shadow" aria-labelledby="dropdownSubMenu1">
                <li><a href="<?= base_url('Home/RekapKasMasjid') ?>" class="dropdown-item">Rekap Kas Masjid</a></li>
                <li><a href="<?= base_url('Home/RekapKasSosial') ?>" class="dropdown-item">Rekap Kas Sosial</a></li>
              </ul>
            </li>
            <li class="nav-item"><a href="<?= base_url('Home/PesertaQurban') ?>" class="nav-link">Peserta Kurban</a></li>
            <li class="nav-item">
              <a href="<?= base_url('Home/Donasi') ?>" class="btn btn-warning">
                <i class="fas fa-hand-holding-usd"></i> Donasi
              </a>
            </li>
            <li class="nav-item ml-2">
              <a href="<?= base_url('login') ?>" class="btn btn-primary">
                <i class="fas fa-sign-in-alt"></i> Login
              </a>

            </li>
          </ul>
        </div>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper -->
  <div class="content-wrapper">

    <!-- Content Header -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= $judul ?> <small></small></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?= $judul ?></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <?php
            if (isset($page)) {
              echo view($page, get_defined_vars());
            }
          ?>
        </div>
      </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark"></aside>

  <!-- Footer -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-inline">Anything you want</div>
    <strong>&copy; <?= date('Y') ?> <a href="#"><?= $web['nama_masjid'] ?? 'Masjid' ?></a>.</strong>
    <?= $web['alamat'] ?? 'Alamat belum tersedia' ?>.
  </footer>

</div>
<!-- ./wrapper -->

<!-- Scripts -->
<script src="<?= base_url('AdminLTE3/plugins/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('AdminLTE3/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('AdminLTE3/dist/js/adminlte.min.js') ?>"></script>
</body>
</html>
