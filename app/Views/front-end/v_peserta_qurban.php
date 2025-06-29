<div class="container-fluid px-4">
  <div class="card shadow-sm border-0">
    <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
      <h5 class="mb-0">
        <i class="fas fa-calendar-alt me-2"></i>
        <?php if (isset($tahun)) : ?>
          Peserta Qurban Tahun <?= esc($tahun['tahun_h']) ?> H / <?= esc($tahun['tahun_m']) ?> M
        <?php else : ?>
          Data Peserta Qurban 
        <?php endif; ?>
      </h5>
    </div>

    <div class="card-body bg-white">

      <!-- Flash Messages tanpa judul -->
      <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <?= session()->getFlashdata('pesan') ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>

      <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?= session()->getFlashdata('error') ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>

      <?php if (session()->getFlashdata('info')) : ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
          <?= session()->getFlashdata('info') ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>

      <div class="row">
        <?php if (!empty($kelompok)) : ?>
          <?php foreach ($kelompok as $value) : ?>
            <div class="col-md-6 mb-4">
              <div class="card border-success shadow-sm h-100">
                <div class="card-header bg-white border-success d-flex justify-content-between align-items-center">
                  <strong class="text-success"><?= esc($value['nama_kelompok']) ?></strong>
                </div>

                <div class="card-body">
                  <table class="table table-borderless mb-0">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Peserta</th>
                        <th>Biaya</th>
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
                          </tr>
                      <?php endforeach; ?>
                      <?php else : ?>
                        <tr>
                          <td colspan="3" class="text-muted text-center">Belum ada anggota</td>
                        </tr>
                      <?php endif; ?>

                      <tr>
                        <td colspan="2" class="text-end"><strong>Total Biaya:</strong></td>
                        <td><strong>Rp. <?= number_format(array_sum($total), 0, ',', '.') ?></strong></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else : ?>
          <div class="col-12">
            <div class="alert alert-info text-center">
              Belum ada kelompok qurban pada tahun ini.
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
