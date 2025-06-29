<div class="col-md-12">
  <div class="card card-success">
    <div class="card-header">
      <h3 class="card-title"><?= $judul ?></h3>
    </div>

    <form action="<?= base_url('admin/updateSetting') ?>" method="post">
      <div class="card-body">
        <!-- Input Nama Masjid -->
        <div class="form-group">
          <label>Nama Masjid</label>
          <input type="text" name="nama_masjid" class="form-control" value="<?= $setting['nama_masjid'] ?>" required>
        </div>

        <!-- Input Nama Kota -->
        <div class="form-group">
          <label>Kab/Kota</label> 
          <input type="text" name="id" class="form-control select2 " value="<?= $setting['nama_kota'] ?>" required>
            <!-- Tambahan opsi kota bisa disisipkan di sini -->
          </select>
        </div>
         <!-- Alamat -->
         <div class="form-group">
          <label>Alamat</label>
          <textarea name="alamat" class="form-control" rows="3" required><?= $setting['alamat'] ?></textarea>
        </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-success">Simpan</button>
      </div>
    </form>
  </div>
</div>
<script>
$(function () {
  $('.select2').select2();
});
</script>


