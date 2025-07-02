<div class="col-md-12">
  <div class="card card-success">
    <div class="card-header">
      <h3 class="card-title">Data <?= esc($judul) ?> Bulan <?= date('m Y') ?></h3>
    </div>

    <div class="card-body">
      <table class="table table-bordered table-striped" id="example1">
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
          <?php if (!empty($kas)) : ?>
            <?php $no = 1; foreach ($kas as $value) : ?>
              <?php
                $rowClass = '';
                if (!empty($value['kas_masuk']) && $value['kas_masuk'] > 0) {
                  $rowClass = 'text-success';
                } elseif (!empty($value['kas_keluar']) && $value['kas_keluar'] > 0) {
                  $rowClass = 'text-danger';
                }
              ?>
              <tr class="<?= $rowClass ?>">
                <td><?= $no++ ?></td>
                <td><?= esc($value['tanggal'] ?? '-') ?></td>
                <td><?= esc($value['ket'] ?? '-') ?></td>
                <td class="text-right">Rp. <?= number_format($value['kas_masuk'] ?? 0, 0, ',', '.') ?></td>
                <td class="text-right">Rp. <?= number_format($value['kas_keluar'] ?? 0, 0, ',', '.') ?></td>
              </tr>
            <?php endforeach; ?>
          <?php else : ?>
            <tr>
              <td colspan="5" class="text-center text-muted">Tidak ada data kas bulan ini.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
