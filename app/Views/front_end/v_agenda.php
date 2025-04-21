<div class="col-md-12">
  <div class="card card-success">
    <div class="card-header">
      <h3 class="card-title">Data <?= $judul ?>Bulan <?=date('M')?></h3>
        </a>
      </div>
    </div>
    <!-- /.card-header -->

    <div class="card-body">
      <table class="table table-bordeless">
        <thead class="thead-dark text-center">
        <tbody>
          <?php foreach ($agenda as $value) : ?>
            <tr class="text-center">
              <td>width="50px"
              <td class="text-left">
                <i class="fas fa-bullhorn text-success"></i> <strong><?= $value['nama_kegiatan'] ?></strong><br>
                <small>
                  <i class="far fa-calendar-alt"></i> Tanggal: <?= date('d-m-Y', strtotime($value['tanggal'])) ?><br>
                  <i class="far fa-clock"></i> Jam: <?= $value['jam'] ?> - Selesai
                </small>
              </td>
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
