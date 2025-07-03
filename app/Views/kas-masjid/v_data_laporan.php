<div class="mb-3">
  <b>Bulan:</b> <?= $bulan ?> &nbsp;&nbsp;
  <b>Tahun:</b> <?= $tahun ?>
</div>

<table class="table table-bordered table-striped" id="example1">
  <thead class="bg-success text-white text-center">
    <tr>
      <th width="50px">No</th>
      <th width="100px">Tanggal</th>
      <th>Keterangan</th>
      <th>Kas Masuk</th>
      <th>Kas Keluar</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    $totalMasuk = 0;
    $totalKeluar = 0;
    foreach ($kas as $value) :
      $totalMasuk += $value['kas_masuk'];
      $totalKeluar += $value['kas_keluar'];
    ?>
      <tr class="<?= $value['status'] == 'Masuk' ? 'text-success' : 'text-danger' ?>">
        <td><?= $no++ ?></td>
        <td><?= date('d-m-Y', strtotime($value['tanggal'])) ?></td>
        <td><?= esc($value['ket']) ?></td>
        <td class="text-right">Rp. <?= number_format($value['kas_masuk'], 0, ',', '.') ?></td>
        <td class="text-right">Rp. <?= number_format($value['kas_keluar'], 0, ',', '.') ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
  <tfoot>
    <tr class="font-weight-bold bg-light">
      <td colspan="3" class="text-center">Total</td>
      <td class="text-right">Rp. <?= number_format($totalMasuk, 0, ',', '.') ?></td>
      <td class="text-right">Rp. <?= number_format($totalKeluar, 0, ',', '.') ?></td>
    </tr>
    <tr class="font-weight-bold bg-warning">
      <td colspan="3" class="text-center">Saldo Akhir</td>
      <td colspan="2" class="text-center">
        Rp. <?= number_format($totalMasuk - $totalKeluar, 0, ',', '.') ?>
      </td>
    </tr>
  </tfoot>
</table>
