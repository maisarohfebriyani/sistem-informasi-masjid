<?= session()->getFlashdata('pesan'); ?>

<form action="<?= base_url('agenda/update/' . $agenda['id_agenda']) ?>" method="post">
    <div class="form-group">
        <label for="nama_kegiatan">Nama Kegiatan</label>
        <input type="text" name="nama_kegiatan" value="<?= $agenda['nama_kegiatan'] ?>" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="tanggal">Tanggal</label>
        <input type="date" name="tanggal" value="<?= $agenda['tanggal'] ?>" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="jam">Jam</label>
        <input type="time" name="jam" value="<?= $agenda['jam'] ?>" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
