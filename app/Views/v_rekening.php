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
      <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('pesan') ?></div>
      <?php endif; ?>

      <table id="example1" class="table table-bordered table-striped">
        <thead class="thead-dark text-center">
          <tr>
            <th width="50px">NO</th>
            <th width="50px"></th>
            <th>Rekening</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; foreach ($rek as $value) { ?>
            <tr>
              <td class="text-center"><?= $no++ ?></td>
              <td class="text-center">
                <i class="fas fa-money-check fa-3x text-success"></i>
              </td>
              <td>
                <h4><b><?= esc($value['nama_bank']) ?></b></h4>
                <h5><?= esc($value['no_rekening']) ?><br></h5>
                a.n: <?= esc($value['atas_nama']) ?>
              </td>
              <td class="text-center">
                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-edit<?= $value['id_rekening'] ?>">
                  <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-hapus<?= $value['id_rekening'] ?>">
                  <i class="fas fa-trash"></i>
                </button>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modal-tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah <?= $judul ?></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <?= form_open('rekening/insertData') ?>
      <div class="modal-body">
        <div class="form-group">
          <label>Nama Bank</label>
          <input type="text" name="nama_bank" class="form-control" required>
        </div>
        <div class="form-group">
          <label>No. Rekening</label>
          <input type="text" name="no_rekening" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Atas Nama</label>
          <input type="text" name="atas_nama" class="form-control" required>
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

<!-- Modal Edit -->
<?php foreach ($rek as $value) { ?>
  <div class="modal fade" id="modal-edit<?= $value['id_rekening'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-warning">
          <h4 class="modal-title">Edit Rekening</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <?= form_open('rekening/UpdateData/' . $value['id_rekening']) ?>
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Bank</label>
            <input type="text" name="nama_bank" value="<?= esc($value['nama_bank']) ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label>No. Rekening</label>
            <input type="text" name="no_rekening" value="<?= esc($value['no_rekening']) ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Atas Nama</label>
            <input type="text" name="atas_nama" value="<?= esc($value['atas_nama']) ?>" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-warning">Update</button>
        </div>
        <?= form_close() ?>
      </div>
    </div>
  </div>
<?php } ?>

<!-- Modal Hapus -->
<?php foreach ($rek as $value) { ?>
  <div class="modal fade" id="modal-hapus<?= $value['id_rekening'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h4 class="modal-title">Hapus Data</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>Apakah yakin ingin menghapus rekening <b><?= esc($value['nama_bank']) ?></b> a.n <b><?= esc($value['atas_nama']) ?></b>?</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <a href="<?= base_url('rekening/DeleteData/' . $value['id_rekening']) ?>" class="btn btn-danger">Hapus</a>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
