<div class="col-md-12">
  <div class="card card-success">
    <div class="card-header">
      <h3 class="card-title">Edit Agenda</h3>
      <div class="card-tools">
        <a href="<?= base_url('agenda') ?>" class="btn btn-sm btn-danger">
          <i class="fas fa-arrow-left"></i> Kembali
        </a>
      </div>
    </div>
    <div class="card-body">

      <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('pesan') ?></div>
      <?php endif; ?>

      <?php if (!empty(session()->getFlashdata('errors'))) : ?>
        <div class="alert alert-danger">
          <ul>
            <?php foreach (session()->getFlashdata('errors') as $error) : ?>
              <li><?= esc($error) ?></li>
            <?php endforeach ?>
          </ul>
        </div>
      <?php endif; ?>

      <?php echo form_open('agenda/update/' . $agenda['id_agenda']) ?>

      <div class="form-group">
        <label>Nama Kegiatan</label>
        <input type="text" name="nama_kegiatan" class="form-control" value="<?= old('nama_kegiatan', $agenda['nama_kegiatan']) ?>" required>
      </div>

      <div class="form-group">
        <label>Tanggal</label>
        <input type="date" name="tanggal" class="form-control" value="<?= old('tanggal', $agenda['tanggal']) ?>" required>
      </div>

      <div class="form-group">
        <label>Jam</label>
        <input type="time" name="jam" class="form-control" value="<?= old('jam', $agenda['jam']) ?>" required>
      </div>

      <div class="modal-footer justify-content-between">
        <a href="<?= base_url('agenda') ?>" class="btn btn-default">Close</a>
        <button type="submit" class="btn btn-success">Update</button>
      </div>

      <?php echo form_close() ?>

    </div>
  </div>
</div>
