<div class="col-md-12">
<?php 
if ($kas == null) {
    $pemasukan[]= 0;
    $pengeluaran[]= 0;

}else {
    foreach ($kas as $key => $value) {
        $pemasukan[] = $value['kas_masuk'];
        $pengeluaran[] = $value['kas_keluar'];
    } 
}
$saldokasmasjid = array_sum($pemasukan) - array_sum($pengeluaran);
        ?>
</div>

<div class="col-md-12">
<?php 
if ($kas_s == null) {
    $pemasukan_s[]= 0;
    $pengeluaran_s[]= 0;

}else {
    foreach ($kas_s as $key => $value) {
        $pemasukan_s[] = $value['kas_masuk'];
        $pengeluaran_s[] = $value['kas_keluar'];
    } 
}
$saldokassosial = array_sum($pemasukan_s) - array_sum($pengeluaran_s);
        ?>
</div>

<div class="col-lg-6 col-12">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <p>Saldo Kas Masjid</p>
                <h3>Rp. <?= number_format ($saldokasmasjid, 0 ) ?> ,-</h3>
              </div>
              <div class="icon">
                <i class="fas fa-money-bill-wave"></i>
              </div>
              <a href="<?= base_url ('KasMasjid') ?>" class="small-box-footer">Rincian <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-12">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <p>Saldo Kas Sosial</p>
                <h3>Rp. <?= number_format ($saldokassosial, 0 ) ?> ,- </h3>
              </div>
              <div class="icon">
                <i class="fas fa-hand-holding-heart"></i>
              </div>
              <a href="<?= base_url('KasSosial')?> " class="small-box-footer">Rincian <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>