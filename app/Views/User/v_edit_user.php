<form action="<?= base_url('user/update/' . $user['id_user']) ?>" method="post">
  <div class="form-group">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="<?= esc($user['email']) ?>" required>
  </div>
  <div class="form-group">
    <label>Password Baru</label>
    <input type="password" name="password" class="form-control" required>
  </div>
  <button type="submit" class="btn btn-warning">Update</button>
</form>
