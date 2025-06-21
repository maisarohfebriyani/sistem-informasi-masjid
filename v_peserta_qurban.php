<div class="container-fluid px-4">
  <div class="card shadow-sm border-0">
    <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
      <h5 class="mb-0">
        <i class="fas fa-calendar-alt me-2"></i>
        Peserta Qurban Tahun <?= esc($tahun['tahun_h']) ?> H / <?= esc($tahun['tahun_m']) ?> M
      </h5>
    </div>

    <div class="card-body bg-white">
      <div class="row">
        <?php foreach ($kelompok as $value) : ?>
          <div class="col-md-6 mb-4">
            <div class="card border-success shadow-sm h-100">
              <div class="card-header bg-white border-success d-flex justify-content-between align-items-center">
                <strong class="text-success"><?= esc($value['nama_kelompok']) ?></strong>
              </div>

              <div class="card-body">
                <table class="table table-borderless mb-0">
                  <tr>
                    <th>No</th>
                    <th>Nama Peserta</th>
                    <th>Biaya</th>
                    <th></th>
                  </tr>
                  <?php
                  $db = \Config\Database::connect();
                  $anggota = $db->tabel('tbl_peserta_kelompok')
                      ->where('id_kelompok', $value['id_kelompok'])
                      ->get()->getResultArray();
                  $no = 1;
                     
                  foreach ($peserta as $key => $peserta) {
                    $biaya = $db->tabel('tbl_peserta_kelompok')
                    ->where('id_kelompok', $peserta['id_kelompok'])
                      ->select('tbl_peserta_kelompok, id_kelompok')
                      ->groupBy('tbl_peserta_kelompok, id_kelompok')
                      ->selectSum('tbl_peserta_kelompok, biaya')
                      ->get()->getRowArray();

                  ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $peserta['nama_peserta'] ?></td>
                    <td>Rp. <?= number_format($peserta['biaya'], 0) ?></td>
                  </tr>
                  <?php } ?>
                  <tr class='text-sucess'>
                    <td></td>
                    <td><b>Total Biaya : </b></td>
                    <td><b>Rp <?= $peserta == null ? '0' : number_format($biaya['biaya']), 0 ?></b></td>
                  </tr>
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
