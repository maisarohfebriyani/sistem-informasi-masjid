<div class="col-md-12">
  <div class="card card-success">
    <div class="card-header">
      <h3 class="card-title">Data <?= $judul ?> Bulan <?= date('m Y') ?></h3>
    </div>

    <div class="card-body">
      <table class="table" id="example1">
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
          <?php $no = 1; foreach ($kas as $value) : ?>
            <?php
              // Menentukan class baris berdasarkan kas masuk/keluar
              $rowClass = '';
              if (isset($value['kas_masuk']) && $value['kas_masuk'] > 0) {
                $rowClass = 'text-success';
              } elseif (isset($value['kas_keluar']) && $value['kas_keluar'] > 0) {
                $rowClass = 'text-danger';
              }
            ?>
            <tr class="<?= $rowClass ?>">
              <td><?= $no++ ?></td>
              <td><?= $value['tanggal'] ?? '-' ?></td> 
              <td><?= $value['ket'] ?? '-' ?></td>
              <td class="text-right">Rp. <?= isset($value['kas_masuk']) ? number_format($value['kas_masuk'], 0, ',', '.') : '0' ?></td>
              <td class="text-right">Rp. <?= isset($value['kas_keluar']) ? number_format($value['kas_keluar'], 0, ',', '.') : '0' ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
