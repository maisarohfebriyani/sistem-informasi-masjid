<div class="col-md-12">
  <div class="card card-success ">
    <div class="card-header">
      <h3 class="card-title">Data <?= $judul ?>Bulan <?=date('M')?></h3>
        </a>
      </div>
    </div>
    <!-- /.card-header -->

    <div class="card-body">
          <div class="row">
          <?php foreach ($agenda as $value) : ?>
            <tr class="text-center">
            </div>
          <!-- /.col -->
          <div class="col-md-6 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon"><i class="fas fa-buiihorn text-succes fa-2"></i>

              <div class="info-box-content">
                <span class="info-box-text">Kegiatan</span>
                <span class="info-box-number"><?=$Value['nama_kegiatan']?></span>

                <div class="progress">
                  <div class="progress-bar" style="width: 0%"></div>
                </div>
                <span class="progress-description">
                  <i> class="fas fa-calender alt text-succes"></i><?=" $value?['tanggal']?>
                  <i> class=" fas fa-clock text-succes"></i>=" $value?['jam']?>
               </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
              </td>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
