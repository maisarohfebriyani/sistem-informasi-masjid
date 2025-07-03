<div class="col-md-12">
  <div class="card card-success">
    <div class="card-header">
      <h3 class="card-title">Data <?= esc($judul) ?></h3>
    </div>

    <div class="card-body">
      <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success"><?= esc(session()->getFlashdata('pesan')) ?></div>
      <?php endif; ?>

      <table id="example1" class="table table-bordered table-striped">
        <thead class="thead-dark text-center">
          <tr>
            <th>No</th>
            <th>Rekening Tujuan</th>
            <th>Rekening Pengirim</th>
            <th>Jumlah</th>
            <th>Jenis Donasi</th>
            <th>Bukti</th>
            <th>Tanggal</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; foreach ($donasi as $value) : ?>
            <tr class="text-center">
              <!-- No -->
              <td><?= $no++ ?></td>

              <!-- Rekening Tujuan -->
              <td class="text-left">
                <strong><?= esc($value['nama_bank_tujuan'] ?? '-') ?></strong><br>
                <?= esc($value['no_rekening_tujuan'] ?? '-') ?><br>
              </td>

              <!-- Rekening Pengirim -->
              <td class="text-left">
                <strong><?= esc($value['nama_bank_pengirim'] ?? '-') ?></strong><br>
                <?= esc($value['no_rekening_pengirim'] ?? '-') ?><br>
                a.n : <?= esc($value['nama_pengirim'] ?? '-') ?>
              </td>

              <!-- Jumlah -->
              <td>
                Rp. <?= isset($value['jumlah']) ? number_format($value['jumlah'], 0, ',', '.') : '0' ?>
              </td>

              <!-- Jenis Donasi -->
              <td>
                <?php if (!empty($value['jenis_donasi']) && strtolower($value['jenis_donasi']) == 'masjid') : ?>
                  <span class="badge badge-success">Masjid</span>
                <?php elseif (!empty($value['jenis_donasi']) && strtolower($value['jenis_donasi']) == 'sosial') : ?>
                  <span class="badge badge-primary">Sosial</span>
                <?php else : ?>
                  <span class="badge badge-secondary">-</span>
                <?php endif; ?>
              </td>

              <!-- Bukti Transfer (klik untuk perbesar) -->
              <td>
                <?php if (!empty($value['bukti'])) : ?>
                  <a href="<?= base_url('bukti/' . $value['bukti']) ?>" target="_blank">
                    <img src="<?= base_url('bukti/' . $value['bukti']) ?>" width="100px" class="img-thumbnail" alt="Bukti Transfer">
                  </a>
                <?php else : ?>
                  <span class="text-danger">Belum ada</span>
                <?php endif; ?>
              </td>

              <!-- Tanggal -->
              <td>
                <?= !empty($value['tgl']) ? date('d-m-Y', strtotime($value['tgl'])) : '-' ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
