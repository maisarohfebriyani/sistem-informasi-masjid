<div class="container-fluid px-4">
  <div class="card shadow-sm border-0">
    <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
      <h5 class="mb-0">
        <i class="fas fa-calendar-alt me-2"></i>
        Peserta Qurban Tahun <?= esc($tahun['tahun_h']) ?> H / <?= esc($tahun['tahun_m']) ?> M
      </h5>
      <button type="button" class="btn btn-light btn-sm shadow-sm" data-toggle="modal" data-target="#modal-tambah-kelompok">
        <i class="fas fa-plus-circle me-1 text-success"></i> Tambah Kelompok
      </button>
    </div>

    <div class="card-body bg-white">
      <div class="row">
        <?php foreach ($kelompok as $value) : ?>
          <div class="col-md-6 mb-4">
            <div class="card border-success shadow-sm h-100">
              <div class="card-header bg-white border-success d-flex justify-content-between align-items-center">
                <strong class="text-success"><?= esc($value['nama_kelompok']) ?></strong>
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-tambah-anggota<?= $value['id_kelompok'] ?>">
                  <i class="fas fa-plus"></i> Tambah Anggota
                </button>
              </div>

              <div class="card-body">
                <table class="table table-borderless mb-0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Peserta</th>
                      <th>Biaya</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $db = \Config\Database::connect();
                    $anggota = $db->table('tbl_anggota_kelompok')
                                  ->where('id_kelompok', $value['id_kelompok'])
                                  ->get()
                                  ->getResultArray();

                    $no = 1;
                    $total = [];

                    if (!empty($anggota)) :
                      foreach ($anggota as $a) :
                        $total[] = $a['biaya'];
                    ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= esc($a['nama_peserta']) ?></td>
                          <td>Rp. <?= number_format($a['biaya'], 0, ',', '.') ?></td>
                          <td>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete-peserta<?= $a['id_anggota'] ?>">
                              <i class="fas fa-trash-alt"></i>
                            </button>
                          </td>
                        </tr>

                        <!-- Modal Hapus Peserta -->
                        <div class="modal fade" id="modal-delete-peserta<?= $a['id_anggota'] ?>" tabindex="-1">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <?= form_open('PesertaQurban/deletePeserta/' . $a['id_anggota']) ?>
                                <div class="modal-header bg-danger text-white">
                                  <h5 class="modal-title">Hapus Peserta</h5>
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                  <p>Yakin ingin menghapus peserta <strong><?= esc($a['nama_peserta']) ?></strong>?</p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                  <button type="submit" class="btn btn-danger">Hapus</button>
                                </div>
                              <?= form_close() ?>
                            </div>
                          </div>
                        </div>
                      <?php endforeach; ?>
                    <?php else : ?>
                      <tr>
                        <td colspan="4" class="text-muted text-center">Belum ada anggota</td>
                      </tr>
                    <?php endif; ?>

                    <tr>
                      <td colspan="2" class="text-end"><strong>Total Biaya:</strong></td>
                      <td colspan="2"><strong>Rp. <?= number_format(array_sum($total), 0, ',', '.') ?></strong></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="card-footer text-left">
                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete-kelompok<?= $value['id_kelompok'] ?>">
                  <i class="fas fa-trash"></i> Delete Kelompok
                </button>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>

<!-- Modal Tambah Kelompok -->
<div class="modal fade" id="modal-tambah-kelompok" tabindex="-1" aria-labelledby="modalTambahKelompokLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow rounded-3">
      <?= form_open('PesertaQurban/insertKelompok') ?>
        <div class="modal-header bg-success text-white rounded-top">
          <h5 class="modal-title" id="modalTambahKelompokLabel">
            <i class="fas fa-users me-2"></i> Tambah Kelompok Qurban
          </h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body p-4">
          <input type="hidden" name="id_tahun" value="<?= esc($tahun['id_tahun']) ?>">
          <div class="form-group mb-3">
            <label for="nama_kelompok"><strong>Nama Kelompok</strong></label>
            <input type="text" name="nama_kelompok" id="nama_kelompok" class="form-control" placeholder="Contoh: Kelompok 1" required>
          </div>
          <div class="d-flex justify-content-between mt-4">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              <i class="fas fa-times me-1"></i> Batal
            </button>
            <button type="submit" class="btn btn-success">
              <i class="fas fa-save me-1"></i> Simpan
            </button>
          </div>
        </div>
      <?= form_close() ?>
    </div>
  </div>
</div>

<!-- Modal Tambah & Hapus Kelompok -->
<?php foreach ($kelompok as $value): ?>
  <!-- Modal Tambah Anggota -->
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
              <input type="text" name="nama_peserta" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Biaya</label>
              <input type="number" name="biaya" class="form-control" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Simpan</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          </div>
        <?= form_close() ?>
      </div>
    </div>
  </div>

  <!-- Modal Delete Kelompok -->
  <div class="modal fade" id="modal-delete-kelompok<?= $value['id_kelompok'] ?>" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <?= form_open('PesertaQurban/DeleteKelompok/' . $value['id_kelompok']) ?>
          <div class="modal-header bg-danger text-white">
            <h5 class="modal-title">Hapus Kelompok</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <p>Yakin ingin menghapus <strong><?= esc($value['nama_kelompok']) ?></strong>?</p>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-danger">Hapus</button>
          </div>
        <?= form_close() ?>
      </div>
    </div>
  </div>
<?php endforeach; ?>


<script>
  $(document).ready(function () {
    $('.btn-hapus-peserta').on('click', function () {
      const id = $(this).data('id');
      const nama = $(this).data('nama');

      if (confirm(`Yakin ingin menghapus peserta ${nama}?`)) {
        $.ajax({
          url: '<?= base_url('PesertaQurban/deletePesertaAjax') ?>/' + id,
          method: 'POST',
          success: function (response) {
            if (response.status === 'success') {
              // reload hanya bagian tabel
              location.reload(); // reload full page (atau bisa ganti dengan reload kontainer)
            } else {
              alert('Gagal menghapus peserta');
            }
          },
          error: function () {
            alert('Terjadi kesalahan server');
          }
        });
      }
    });
  });
</script>

