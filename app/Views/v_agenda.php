<div class="col-md-12">
  <div class="card card-success">
    <div class="card-header">
      <h3 class="card-title">Data <?= $judul ?></h3>
      <div class="card-tools">
        <a href="<?= base_url('agenda/tambah') ?>" class="btn btn-tool text-success">
          <i class="fas fa-plus"></i> Tambah
        </a>
      </div>
    </div>
    <!-- /.card-header -->

    <div class="card-body">
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
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
