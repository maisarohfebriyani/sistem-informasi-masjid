<div class="col-md-12">
  <div class="card card-success">
    <div class="card-header">
      <h3 class="card-title"><?= $judul ?></h3>
    </div>

    <form action="<?= base_url('admin/updateSetting') ?>" method="post">
      <div class="card-body">
        <!-- Nama Masjid -->
        <div class="form-group">
          <label>Nama Masjid</label>
          <input type="text" name="nama_masjid" class="form-control" value="<?= $setting['nama_masjid'] ?>" required>
        </div>

        <!-- Pilih Kota -->
        <div class="form-group">
          <label>Pilih Kota (untuk jadwal sholat)</label>
          <select name="id_kota" class="form-control select2" required>
            <option value="">-- Pilih Kota --</option>
            <?php foreach ($kota['data'] as $k) { ?>
              <option value="<?= $k['id'] ?>" <?= $k['id'] == $setting['id_kota'] ? 'selected' : '' ?>>
                <?= $k['lokasi'] ?> (<?= $k['id'] ?>)
              </option>
            <?php } ?>
          </select>
        </div>

        <!-- Alamat -->
        <div class="form-group">
          <label>Alamat</label>
          <textarea name="alamat" class="form-control" rows="3" required><?= $setting['alamat'] ?></textarea>
        </div>
      </div>

      <div class="card-footer">
        <button type="submit" class="btn btn-success">Simpan</button>
      </div>
    </form>
  </div>
</div>

<!-- Script Select2 -->
<script>
  $(function () {
    $('.select2').select2({
      theme: 'bootstrap4'
    });
  });
</script>
