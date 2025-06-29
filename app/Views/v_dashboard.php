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

<div class="col-lg-6 col-12">
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Rekap Kas Masjid Bulan <?= date('M Y')?></h3>
      
    </div>

    <div class="card-body">
    <table class="table text-sm">
        <thead>
          <tr class="text-center">
            <th width="50px">No</th>
            <th width="100px">Tanggal</th>
            <th>Keterangan</th>
            <th>Kas Masuk</th>
            <th>Kas Keluar</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; foreach ($kasmasjid as $value) : ?>
            <tr class="<?= $value['status'] == 'Masuk' ? 'text-success' : 'text-danger' ?>">
            <td><?= $no++ ?></td>
              <td><?= $value['tanggal'] ?></td> 
              <td><?= $value['ket'] ?></td>
              <td class="text-right">Rp. <?= number_format($value['kas_masuk'], 0) ?></td>
              <td class="text-right">Rp. <?= number_format($value['kas_keluar'], 0) ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
</div>
</div>

<div class="col-lg-6 col-12">
  <div class="card card-success">
    <div class="card-header">
      <h3 class="card-title">Rekap Kas Soisal Bulan <?= date('M Y')?></h3>
      
    </div>

    <div class="card-body">
    <table class="table text-sm">
        <thead>
          <tr class="text-center">
            <th width="50px">No</th>
            <th width="100px">Tanggal</th>
            <th>Keterangan</th>
            <th>Kas Masuk</th>
            <th>Kas Keluar</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; foreach ($kassosial as $value) : ?>
            <tr class="<?= $value['status'] == 'Masuk' ? 'text-success' : 'text-danger' ?>">
            <td><?= $no++ ?></td>
              <td><?= $value['tanggal'] ?></td> 
              <td><?= $value['ket'] ?></td>
              <td class="text-right">Rp. <?= number_format($value['kas_masuk'], 0) ?></td>
              <td class="text-right">Rp. <?= number_format($value['kas_keluar'], 0) ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
</div>
</div>