<div class="col-md-12">
  <div class="card card-success">
    <div class="card-header">
      <h3 class="card-title">Data <?= $judul ?></h3>
      
    </div>

    <div class="card-body">
    <table class="table" id="example1">
        <thead>
          <tr>
            <th width="50px">No</th>
            <th width="100px">Tanggal</th>
            <th>Keterangan</th>
            <th>Kas Masuk</th>
            <th>Kas Keluar</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; foreach ($kas as $value) : ?>
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