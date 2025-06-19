<div class="row">
  <?php foreach ($kelompok as $value) : ?>
    <div class="col-md-6 mb-4">
      <div class="card card-outline card-success h-100 shadow-sm">
        <!-- Header -->
        <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
          <h6 class="mb-0">Data Peserta Qurban Tahun <?= esc ($tahun['tahun_h']) ?> H <?= esc ($tahun['tahun_m']) ?> M </h6>
          <button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#modal-tambah-anggota<?= $value['id_kelompok'] ?>">
            <i class="fas fa-plus"></i> Tambah Anggota
          </button>
        </div>
        <!-- Body -->
      </div>
    </div>
  <?php endforeach; ?>
</div>


<!-- Modal Tambah Anggota -->
<?php foreach ($kelompok as $value): ?>
  <div class="modal fade" id="modal-tambah-anggota<?= $value['id_kelompok'] ?>" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <?= form_open('PesertaQurban/tambahAnggota/' . $value['id_kelompok']) ?>
          <div class="modal-header bg-success text-white">
            <h5 class="modal-title">Tambah Anggota - <?= esc($value['nama_kelompok']) ?></h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Nama Anggota</label>
              <input type="text" name="nama" class="form-control" required>
            </div>
            <!-- Tambahan field lainnya jika diperlukan -->
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Simpan</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          </div>
        <?= form_close() ?>
      </div>
    </div>
  </div>
<?php endforeach; ?>
