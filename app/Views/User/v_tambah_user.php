<form action="<?= base_url('user/simpan') ?>" method="post">
  <div class="form-group">
    <label>Email</label>
    <input type="email" name="email" class="form-control" required>
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" name="password" class="form-control" required>
  </div>
  <button type="submit" class="btn btn-success">Simpan</button>
</form>
