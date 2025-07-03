<div class="col-md-12">
  <div class="card card-success">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h3 class="card-title">Data User</h3>
      <button class="btn btn-light btn-sm" data-toggle="modal" data-target="#modal-tambah">
        <i class="fas fa-plus-circle"></i> Tambah
      </button>
    </div>

    <div class="card-body">
      <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('pesan') ?></div>
      <?php endif; ?>

      <div class="table-responsive">
        <table class="table table-bordered table-striped" id="example1">
          <thead class="bg-success text-white text-center">
            <tr>
              <th width="50">No</th>
              <th>Email</th>
              <th>Password</th>
              <th width="100">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; foreach ($user as $u) : ?>
              <tr class="text-center">
                <td><?= $no++ ?></td>
                <td class="text-left"><?= esc($u['email']) ?></td>
                <td><?= esc($u['password']) ?></td>
                <td>
                  <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-edit<?= $u['id_user'] ?>">
                    <i class="fas fa-edit"></i>
                  </button>
                  <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-hapus<?= $u['id_user'] ?>">
                    <i class="fas fa-trash"></i>
                  </button>
                </td>
              </tr>

              <!-- Modal Edit -->
              <div class="modal fade" id="modal-edit<?= $u['id_user'] ?>">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header bg-success">
                      <h4 class="modal-title">Edit User</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                      <form action="<?= base_url('user/update/' . $u['id_user']) ?>" method="post">
                        <div class="form-group">
                          <label>Email</label>
                          <input type="email" name="email" value="<?= $u['email'] ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label>Password</label>
                          <input type="text" name="password" value="<?= $u['password'] ?>" class="form-control" required>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
                          <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Modal Hapus -->
              <div class="modal fade" id="modal-hapus<?= $u['id_user'] ?>">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header bg-danger">
                      <h4 class="modal-title">Hapus User</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                      Yakin ingin menghapus <strong><?= $u['email'] ?></strong>?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-warning" data-dismiss="modal">Tidak</button>
                      <a href="<?= base_url('user/hapus/' . $u['id_user']) ?>" class="btn btn-danger">Ya</a>
                    </div>
                  </div>
                </div>
              </div>

            <?php endforeach ?>
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
      <div class="modal-header bg-success">
        <h4 class="modal-title">Tambah User</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('user/simpan') ?>" method="post">
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="text" name="password" class="form-control" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-success">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
