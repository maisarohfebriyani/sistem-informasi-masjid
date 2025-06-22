<div class="col-md-12">
  <div class="card card-success">
    <div class="card-header">
      <h3 class="card-title">Data <?= $judul ?></h3>
      <div class="card-tools">
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-tambah">
          <i class="fas fa-plus"></i> Tambah
        </button>
      </div>
    </div>

    <div class="card-body">
      <!-- Flashdata Pesan -->
      <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('pesan') ?></div>
      <?php endif; ?>
      <table id="example1" class="table table-bordered table-striped">
        <thead class="thead-dark text-center">
          <tr>
            <th width="50px">No</th>
            <th>Rekening Tujuan</th>
            <th>Rekening pengirim</th>
            <th>Jumlah</th>
            <th>Bukti</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; foreach ($donasi as $value) : ?>
            <tr class="text-center">
              <td><?= $no++ ?></td>

               <td>
            <p>
                <h5><b><?=$value['nama_bank_tujuan'] ?></b></h5>
                <?= $value['no_rek_tujuan'] ?><br>
          </p>
          </td>

              <td>
            <p>
                <h5><b><?=$value['nama_bank_pengirim'] ?></b></h5>
                <?= $value['no_rek_pengirim'] ?><br>
                a.n : <?= $value['nama_pengirim'] ?><br>
                Tanggal : <?= $value['tgl'] ?>
          </p>
          </td>
          <td>Rp. <?= number_format($value['jumlah'], 0) ?></td>
          <?= $value['jenis_donasi'] == 'Masjid' ? '<span class="right badge badge-success">Masjid</span>' : '<span class="right badge badge-primary">Sosial</span>'?>
          <td>
            <img src="<?= base_url('bukti/' . $value['bukti']) ?>" width="250px">
          </td>
          <td></td>            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>