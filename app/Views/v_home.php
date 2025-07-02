<div class="col-lg-9">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <?php for ($i = 0; $i < 3; $i++): ?>
        <div class="carousel-item <?= $i == 0 ? 'active' : '' ?>">
          <img src="https://media.istockphoto.com/id/1326906006/id/vektor/desain-latar-belakang-islam-dengan-ilustrasi-siluet-masjid-dapat-digunakan-untuk-kartu.jpg?s=2048x2048&w=is&k=20&c=8WWX_LQrNJBtH1wGElU2muF1IEQYvFunjbX7pD8-pg4=" class="d-block w-100" alt="Slide <?= $i+1 ?>">
          <div class="carousel-caption d-none d-md-block">
            <h5>Slide <?= $i + 1 ?> label</h5>
            <p>Contoh isi slide ke-<?= $i + 1 ?>.</p>
          </div>
        </div>
      <?php endfor; ?>
    </div>
    <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </button>
  </div>
  <br>
</div>

<!-- Card Jadwal Sholat -->
<div class="col-lg-3">
  <div class="card card-outline card-success">
    <div class="card-header">
      <h3 class="card-title text-success">
        <b><?= isset($waktu['data']['lokasi']) ? $waktu['data']['lokasi'] : 'Lokasi Tidak Diketahui' ?></b>
      </h3>
    </div>
    <div class="card-body p-3">
      <ul class="products-list product-list-in-card pl-2 pr-2">
        <?php 
        $jadwal = $waktu['data']['jadwal'] ?? [];
        $sholatList = ['subuh', 'dhuha', 'dzuhur', 'ashar', 'maghrib', 'isya'];
        foreach ($sholatList as $sholat): ?>
          <li class="item">
            <div class="product-img">
              <i class="far fa-clock fa-3x text-success"></i>
            </div>
            <div class="product-info">
              <a class="product-title"><?= ucfirst($sholat) ?></a>
              <span class="product-description">
                <?= isset($jadwal[$sholat]) ? $jadwal[$sholat] : '-' ?>
              </span>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
      <div class="text-center">
        <b class="text-success"><?= isset($jadwal['tanggal']) ? $jadwal['tanggal'] : '-' ?></b>
      </div>
    </div>
  </div>
</div>

<!-- Saldo Kas -->
<div class="col-lg-12">
  <div class="row">

    <!-- Saldo Masjid -->
    <div class="col-md-12">
      <?php
      $pemasukan = $pengeluaran = [];
      if (!empty($kas)) {
          foreach ($kas as $value) {
              $pemasukan[] = $value['kas_masuk'];
              $pengeluaran[] = $value['kas_keluar'];
          }
      } else {
          $pemasukan[] = 0;
          $pengeluaran[] = 0;
      }
      $saldo_masjid = array_sum($pemasukan) - array_sum($pengeluaran);
      ?>
    </div>

    <!-- Saldo Sosial -->
    <div class="col-md-12">
      <?php
      $pemasukan_s = $pengeluaran_s = [];
      if (!empty($kas_s)) {
          foreach ($kas_s as $value) {
              $pemasukan_s[] = $value['kas_masuk'];
              $pengeluaran_s[] = $value['kas_keluar'];
          }
      } else {
          $pemasukan_s[] = 0;
          $pengeluaran_s[] = 0;
      }
      $saldo_sosial = array_sum($pemasukan_s) - array_sum($pengeluaran_s);
      ?>
    </div>

    <!-- Box Kas Masjid -->
    <div class="col-md-6">
      <div class="info-box">
        <span class="info-box-icon bg-primary elevation-1">
          <i class="fas fa-money-bill-wave"></i>
        </span>
        <div class="info-box-content">
          <span class="info-box-text">Saldo Kas Masjid</span>
          <span class="info-box-number">Rp. <?= number_format($saldo_masjid, 0, ',', '.') ?></span>
        </div>
      </div>
    </div>

    <!-- Box Kas Sosial -->
    <div class="col-md-6">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-success elevation-1">
          <i class="fas fa-hand-holding-heart"></i>
        </span>
        <div class="info-box-content">
          <span class="info-box-text">Saldo Kas Sosial</span>
          <span class="info-box-number">Rp. <?= number_format($saldo_sosial, 0, ',', '.') ?></span>
        </div>
      </div>
    </div>

  </div>
</div>
