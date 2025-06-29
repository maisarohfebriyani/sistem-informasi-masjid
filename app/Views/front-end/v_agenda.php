<div class="col-md-12">
  <div class="card card-success">
    <div class="card-header">
      <h3 class="card-title">Data <?= $judul ?> Bulan <?= date('M') ?></h3>
    </div>

    <div class="card-body">
      <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success">
          <?= session()->getFlashdata('pesan') ?>
        </div>
      <?php endif; ?>

      <div class="row">
        <?php if (!empty($agenda)) : ?>
          <?php foreach ($agenda as $value) : ?>
            <div class="col-md-6 col-sm-6 col-12">
              <div class="info-box">
                <span class="info-box-icon">
                  <i class="fas fa-bullhorn text-success fa-2x"></i>
                </span>
                <div class="info-box-content">
                  <span class="info-box-text">Kegiatan</span>
                  <span class="info-box-number"><?= esc($value['nama_kegiatan']) ?></span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 0%"></div>
                  </div>
                  <span class="progress-description">
                    <i class="fas fa-calendar-alt text-success"></i> <?= esc($value['tanggal']) ?><br>
                    <i class="fas fa-clock text-success"></i> <?= esc($value['jam']) ?>
                  </span>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else : ?>
          <div class="col-12">
            <div class="alert alert-warning text-center">
              Tidak ada agenda bulan ini.
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
