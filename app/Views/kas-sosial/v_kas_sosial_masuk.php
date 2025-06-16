<div class="col-md-12">
  <?php 
    $pemasukan = [];
    if (empty($kas_sosial)) {
        $pemasukan[] = 0;
    } else {
        foreach ($kas_sosial as $value) {
            $pemasukan[] = $value['kas_masuk'];  
        } 
    }
  ?>
  <div class="alert alert-success alert-dismissible">
    <h5><i class="fas fa-solid fa-money-bill-wave"></i> Total Pemasukan Kas Sosial</h5>
    <h3>Rp. <?= number_format(array_sum($pemasukan), 0) ?></h3>
  </div>
</div>

<div class="col-md-12">
  <div class="card card-success">
    <div class="card-header">
      <h3 class="card-title">Data <?= $judul ?></h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-tambah">
          <i class="fas fa-plus"></i> Tambah
        </button>
      </div>
    </div>

    <div class="card-body">
      <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('pesan') ?></div>
      <?php endif; ?>

      <table class="table" id="example1">
        <thead>
          <tr class="text-center">
            <th width="50px">No</th>
            <th width="100px">Tanggal</th>
            <th>Keterangan</th>
            <th>Jumlah</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($kas_sosial)) : ?>
            <?php $no = 1; foreach ($kas_sosial as $value) : ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $value['tanggal'] ?></td> 
                <td><?= $value['ket'] ?></td>
                <td class="text-right">Rp. <?= number_format($value['kas_masuk'], 0) ?></td>
                <td class="text-center">
                  <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-edit<?= $value['id_kas_sosial'] ?>">
                    <i class="fas fa-pencil-alt"></i>
                  </button>
                  <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-delete<?= $value['id_kas_sosial'] ?>">
                    <i class="fas fa-trash"></i>
                  </button>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else : ?>
            <tr>
              <td colspan="5" class="text-center">Belum ada data kas masuk.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modal-tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h4 class="modal-title">Tambah Kas Masuk</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('KasSosial/InsertKasMasuk') ?>
        <div class="form-group">
          <label>Tanggal</label>
          <input type="date" name="tanggal" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Keterangan</label>
          <input name="ket" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Jumlah (Rp.)</label>
          <input type="number" min="0" value="0" name="kas_masuk" class="form-control" required>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Simpan</button>
        <?= form_close() ?>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit -->
<?php foreach ($kas_sosial as $value) : ?>
  <div class="modal fade" id="modal-edit<?= $value['id_kas_sosial'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <h4 class="modal-title">Edit Kas Masuk</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?= form_open('KasSosial/UpdateKasMasuk/' . $value['id_kas_sosial']) ?>
          <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tanggal" value="<?= $value['tanggal'] ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Keterangan</label>
            <input name="ket" class="form-control" value="<?= $value['ket'] ?>" required>
          </div>
          <div class="form-group">
            <label>Jumlah (Rp.)</label>
            <input type="number" min="0" name="kas_masuk" value="<?= $value['kas_masuk'] ?>" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Simpan</button>
          <?= form_close() ?>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- Modal Delete -->
<?php foreach ($kas_sosial as $value) : ?>
  <div class="modal fade" id="modal-delete<?= $value['id_kas_sosial'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <h4 class="modal-title">Delete Kas Masuk</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Apakah Yakin Ingin Hapus Data? <b><?= $value['ket'] ?></b>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Tidak</button>
          <a href="<?= base_url('KasSosial/DeleteKasMasuk/' . $value['id_kas_sosial']) ?>" class="btn btn-danger">Ya</a>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>
