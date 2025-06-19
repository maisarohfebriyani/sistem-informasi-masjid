<div class="col-md-12">
  <div class="card border-success shadow-sm">
    <!-- Header Card -->
    <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Data <?= $judul ?></h5>
    </div>

    <!-- Body Card -->
    <div class="card-body">
      <!-- Table -->
      <div class="table-responsive">
        <table id="example1" class="table table-bordered table-hover text-center">
          <thead class="thead-dark">
            <tr>
              <th style="width: 50px;">No</th>
              <th>Tahun</th>
              <th style=>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; foreach ($tahun as $value) : ?>
              <tr>
                <td><?= $no++ ?></td>
                <td>
                  <?= esc($value['tahun_h']) ?> H / <?= esc($value['tahun_m']) ?> M
                  <?php if (date('Y') == $value['tahun_m']) : ?>
                    <span class="badge badge-success ml-2">Active</span>
                  <?php endif; ?>
                </td>
                <td>
                    <a href="<?= base_url('PesertaQurban/KelompokQurban/' . $value['id_tahun']) ?>" class="btn btn-flat btn-sm btn-primary">
                      <i class="fas fa-layer-group"></i> Kelompok Qurban
                    </a>

                </td>

              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>