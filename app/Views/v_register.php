<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
</head>
<body>
    <h1>Registrasi Pengguna Baru</h1>

    <!-- Pesan sukses -->
    <?php if (session()->getFlashdata('sukses')): ?>
        <div style="color: green;">
            <?= session()->getFlashdata('sukses'); ?>
        </div>
    <?php endif; ?>

    <!-- Menampilkan error jika validasi gagal -->
    <?php if (session()->getFlashdata('validation')): ?>
        <div style="color: red;">
            <?= session()->getFlashdata('validation')->listErrors(); ?>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('register/save') ?>" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?= old('email') ?>" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <button type="submit">Daftar</button>
    </form>

    <p>Sudah punya akun? <a href="<?= site_url('login') ?>">Login</a></p>
</body>
</html>
