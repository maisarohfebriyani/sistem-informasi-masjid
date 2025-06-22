<div class="col-md-4">
  <div class="card card-success">
    <div class="card-header">
      <h3 class="card-title">Kirim Donasi</h3>
    </div>

    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <tbody>
          <?php 
          $no = 1;
          foreach ($rek as $value) { ?>
            <tr class="text-center">
              <td><?= $no++ ?></td>
              <td class="text-left">
                <i class="fas fa-money-check fa-2x text-green"></i>
              </td>
              <td>
                <h5><b><?= $value['nama_bank'] ?></b></h5>
                <h6><?= $value['nomor_rek'] ?><br></h6>
                <h6>a.n : <?= $value['atas_nama'] ?></h6>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="col-md-8">
  <div class="card card-success">
    <div class="card-header">
      <h3 class="card-title">Konfirmasi Donasi</h3>
    </div>

    <div class="card-body">
      <!-- Flashdata Pesan -->
      <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('pesan') ?></div>
      <?php endif; ?>

      <?= form_open_multipart('Home/KirimDonasi') ?>
      <?= csrf_field() ?>

      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label>Rekening Tujuan</label>
            <select name="id_rekening" class="form-control" required>
              <?php foreach ($rek as $value) { ?>
                <option value="<?= $value['id_rekening'] ?>">
                  <?= $value['nama_bank'] ?> | <?= $value['nomor_rek'] ?>
                </option>
              <?php } ?>
            </select>
          </div>
        </div>

        <div class="col-6">
          <div class="form-group">
            <label>Jenis Donasi untuk :</label>
            <select name="jenis_donasi" class="form-control" required>
              <option value="Masjid">Masjid</option>
              <option value="Sosial">Sosial</option>
            </select>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label>Nama Bank Pengirim</label>
        <input type="text" class="form-control" name="nama_bank" required>
      </div>

      <div class="form-group">
        <label>No Rekening Pengirim</label>
        <input type="text" class="form-control" name="no_rek" required>
      </div>

      <div class="form-group">
        <label>Nama Pengirim</label>
        <input type="text" class="form-control" name="nama_pengirim" required>
      </div>

      <div class="form-group">
        <label>Jumlah Donasi (Rp.)</label>
        <input type="number" class="form-control" name="jumlah" required>
      </div>

      <div class="form-group">
        <label>Bukti Transfer</label>
        <input type="file" class="form-control" name="bukti" accept="image/*" required>
      </div>

      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">
          <i class="fas fa-paper-plane"></i> Kirim
        </button>
      </div>

      <?= form_close() ?>
    </div>
  </div>
</div>
