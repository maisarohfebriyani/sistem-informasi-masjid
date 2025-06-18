<div class="col-md-12">
  <div class="card border-success shadow-sm">
    <!-- Header Card -->
    <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Data <?= $judul ?></h5>
      <button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#modal-tambah">
        <i class="fas fa-plus"></i> Tambah
      </button>
    </div>

    <!-- Body Card -->
    <div class="card-body">
      <!-- Flashdata Pesan -->
      <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <?= session()->getFlashdata('pesan') ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php endif; ?>

      <!-- Table -->
      <div class="table-responsive">
        <table id="example1" class="table table-bordered table-hover text-center">
          <thead class="thead-dark">
            <tr>
              <th style="width: 50px;">No</th>
              <th>Tahun</th>
              <th style="width: 120px;">Aksi</th>
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
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-edit<?= $value['id_tahun'] ?>" title="Edit">
                        <i class="fas fa-pencil-alt"></i>
                    </button>
                    <a href="<?= base_url('tahun/DeleteData/' . $value['id_tahun']) ?>" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Yakin ingin menghapus tahun ini?');">
                        <i class="fas fa-trash"></i>
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

<!-- Modal Tambah -->
<div class="modal fade" id="modal-tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah <?= $judul ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!-- Form -->
      <?= form_open('tahun/insert-data') ?>
        <div class="modal-body">
          <div class="form-group">
            <label>Tahun Hijriah</label>
            <input type="number" name="tahun_h" class="form-control" min="1443" value="<?= date('Y') + 579 ?>" required>
          </div>
          <div class="form-group">
            <label>Tahun Masehi</label>
            <input type="number" name="tahun_m" class="form-control" min="2022" value="<?= date('Y') ?>" required>
          </div>
        </div>

        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-success">Simpan</button>
        </div>
      <?= form_close() ?>
    </div>
  </div>
</div>
<!-- Modal Update -->
<?php foreach ($tahun as $value) : ?>
  <div class="modal fade" id="modal-edit<?= $value['id_tahun'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h4 class="modal-title">UpdateData</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
<!-- Form -->
      <?= form_open('Tahun/updatedata/' . $value['id_tahun']) ?>
        <div class="modal-body">
          <div class="form-group">
            <label>Tahun Hijriah</label>
            <input type="number" name="tahun_h" class="form-control" min="1443" <?= $value['tahun_h']  ?>  required>
          </div>
          <div class="form-group">
            <label>Tahun Masehi</label>
            <input type="number" name="tahun_m" class="form-control" min="2022" <?= $value['tahun_m']  ?> required>
          </div>
        </div>

        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-success">Simpan</button>
        </div>
      <?= form_close() ?>
    </div>
  </div>
</div>
   <?php endforeach; ?>

<!-- Modal Delete -->
<?php foreach ($tahun as $value) : ?>
  <div class="modal fade" id="modal-delete<?= $value['id_tahun'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h4 class="modal-title">DeleteData</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
<!-- Form -->
      <?= form_open('Tahun/DeleteData/' . $value['id_tahun']) ?>
        <div class="modal-body">
          <div class="form-group">
            <label>Tahun Hijriah</label>
            <input type="number" name="tahun_h" class="form-control" min="1443" <?= $value['tahun_h']  ?>  required>
          </div>
          <div class="form-group">
            <label>Tahun Masehi</label>
            <input type="number" name="tahun_m" class="form-control" min="2022" <?= $value['tahun_m']  ?> required>
          </div>
        </div>

        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Delete</button>
        </div>
      <?= form_close() ?>
    </div>
  </div>
</div>
   <?php endforeach; ?>