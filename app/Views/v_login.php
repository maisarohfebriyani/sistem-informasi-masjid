<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIMASJID | <?= isset($judul) ? $judul : 'Login' ?></title>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE3/plugins/fontawesome-free/css/all.min.css') ?>">
  
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE3/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE3/dist/css/adminlte.min.css') ?>">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-success">
    <div class="card-header text-center">
      <a href="#" class="h1"><i class="fas fa-mosque mr-2"></i><b>SIMASJID</b></a>
      <p class="login-box-msg">MASJID KH. AHMAD DAHLAN</p>
    </div>
    <div class="card-body">
      

      <form action="<?= base_url('login/process') ?>" method="post">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">Remember Me</label>
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-success btn-block">Sign In</button>
          </div>
        </div>
      </form>

      
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="<?= base_url('AdminLTE3/plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('AdminLTE3/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('AdminLTE3/dist/js/adminlte.min.js') ?>"></script>
</body>
</html>
