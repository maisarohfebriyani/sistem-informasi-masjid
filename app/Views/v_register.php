<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register | SIMASJID</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= base_url('AdminLTE3/plugins/fontawesome-free/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('AdminLTE3/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('AdminLTE3/dist/css/adminlte.min.css') ?>">
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-success">
            <div class="card-header text-center">
                <a href="<?= base_url() ?>" class="h1"><i class="fas fa-mosque mr-2"></i><b>SIMASJID</b></a>
                <p class="login-box-msg">Masjid KH. Ahmad Dahlan</p>
            </div>
            <div class="card-body">
                <?php if (session()->getFlashdata('gagal')) : ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('gagal') ?></div>
                <?php endif; ?>

                <?= form_open('/register/save') ?>
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control <?= isset($validation) && $validation->hasError('email') ? 'is-invalid' : '' ?>" placeholder="Email" value="<?= old('email') ?>" required>
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                        </div>
                    </div>
                    <p class="text-danger"><?= isset($validation) ? $validation->getError('email') : '' ?></p>

                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control <?= isset($validation) && $validation->hasError('password') ? 'is-invalid' : '' ?>" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-lock"></span></div>
                        </div>
                    </div>
                    <p class="text-danger"><?= isset($validation) ? $validation->getError('password') : '' ?></p>

                    <div class="input-group mb-3">
                        <input type="password" name="confirm_password" class="form-control <?= isset($validation) && $validation->hasError('confirm_password') ? 'is-invalid' : '' ?>" placeholder="Konfirmasi Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-lock"></span></div>
                        </div>
                    </div>
                    <p class="text-danger"><?= isset($validation) ? $validation->getError('confirm_password') : '' ?></p>

                    <div class="row">
                        <div class="col-4">
                            <button type="submit" class="btn btn-success btn-block">Daftar</button>
                        </div>
                    </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>

    <script src="<?= base_url('AdminLTE3/plugins/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('AdminLTE3/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('AdminLTE3/dist/js/adminlte.min.js') ?>"></script>
</body>
</html>
