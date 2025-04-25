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
      <!-- Flashdata Pesan -->
      <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('pesan') ?></div>
      <?php endif; ?>
      <table id="example1" class="table table-bordered table-striped">
        <thead class="thead-dark text-center">
          <tr>
            <th width="50px">No</th>
            <th>Nama Agenda</th>
            <th width="120px">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; foreach ($agenda as $value) : ?>
            <tr class="text-center">
              <td><?= $no++ ?></td>
              <td class="text-left">
                <i class="fas fa-bullhorn text-success"></i> <strong><?= $value['nama_kegiatan'] ?></strong><br>
                <small>
                  <i class="far fa-calendar-alt"></i> Tanggal: <?= date('d-m-Y', strtotime($value['tanggal'])) ?><br>
                  <i class="far fa-clock"></i> Jam: <?= $value['jam'] ?> - Selesai
                </small>
              </td>
              <td>
                <a href="<?= base_url('agenda/edit/' . $value['id_agenda']) ?>" class="btn btn-warning btn-sm" title="Edit">
                  <i class="fas fa-pencil-alt"></i>
                </a>
                <a href="<?= base_url('agenda/hapus/' . $value['id_agenda']) ?>" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Yakin ingin menghapus agenda ini?');">
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

<!-- Modal Tambah -->
<div class="modal fade" id="modal-tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah <?= $judul ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <!-- ✅ INI SUDAH DIPERBAIKI -->
      <?php echo form_open('agenda/insert-data') ?>

      <div class="modal-body">
        <div class="form-group">
          <label>Nama Kegiatan</label>
          <textarea rows="6" name="nama_kegiatan" class="form-control" required></textarea>
        </div>
        <div class="form-group">
          <label>Tanggal</label>
          <input type="date" class="form-control" name="tanggal">
        </div>
        <div class="form-group">
          <label>Jam</label>
          <input type="time" class="form-control" name="jam">
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Simpan</button>
      </div>

      <?php echo form_close() ?>
    </div>
  </div>
</div>
