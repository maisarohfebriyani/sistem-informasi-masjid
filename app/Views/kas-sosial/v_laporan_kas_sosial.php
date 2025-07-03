<div class="col-md-12">
  <div class="card card-success">
    <div class="card-header">
      <h3 class="card-title">Laporan Kas Sosial</h3>
    </div>

    <div class="card-body">
      <div class="row">
        <!-- Pilihan Bulan -->
        <div class="col-sm-3">
          <div class="form-group">
            <label for="bulan">Bulan</label>
            <select name="bulan" id="bulan" class="form-control">
              <option value="">--Bulan--</option>
              <?php 
                $nama_bulan = [
                  1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                  'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                ];
                foreach ($nama_bulan as $key => $value) :
              ?>
                <option value="<?= $key ?>"><?= $value ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>

        <!-- Pilihan Tahun -->
        <div class="col-sm-3">
          <div class="form-group">
            <label for="tahun">Tahun</label>
            <div class="input-group">
              <select name="tahun" id="tahun" class="form-control">
                <option value="">--Tahun--</option>
                <?php for ($t = 2021; $t <= 2027; $t++) : ?>
                  <option value="<?= $t ?>"><?= $t ?></option>
                <?php endfor; ?>
              </select>
              <div class="input-group-append no-print">
                <button class="btn btn-primary" type="button" onclick="ViewLaporan()">View</button>
                <button class="btn btn-success" type="button" onclick="PrintLaporan()">
                  <i class="fas fa-print"></i> Print
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Area hasil laporan -->
      <div class="mt-4" id="printarea">
        <div class="text-center">
          <?php if ($masjid) : ?>
            <h2><b><?= $masjid['nama_masjid'] ?></b></h2>
            <p><?= $masjid['alamat'] ?></p>
          <?php else: ?>
            <h2><b>Data Masjid Tidak Tersedia</b></h2>
          <?php endif; ?>
          <h4><b>Laporan Kas Sosial</b></h4>
        </div>

        <div id="tampil-laporan">
          <!-- Data laporan akan ditampilkan via AJAX -->
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  function ViewLaporan() {
    let bulan = document.getElementById('bulan').value;
    let tahun = document.getElementById('tahun').value;

    if (bulan === '') {
      alert('Bulan belum dipilih');
    } else if (tahun === '') {
      alert('Tahun belum dipilih');
    } else {
      $.ajax({
        url: "<?= base_url('KasSosial/ViewLaporan') ?>",
        type: "POST",
        data: {
          bulan: bulan,
          tahun: tahun
        },
        success: function (response) {
          $('#tampil-laporan').html(response);
        },
        error: function (xhr) {
          alert('Gagal mengambil data laporan: ' + xhr.responseText);
        }
      });
    }
  }

  function PrintLaporan() {
    var printContents = document.getElementById('printarea').innerHTML;
    var newWin = window.open('', '', 'width=900,height=600');
    newWin.document.write(`
      <html>
        <head>
          <title>Cetak Laporan Kas Sosial</title>
          <style>
            body {
              font-family: Arial, sans-serif;
              font-size: 14px;
              color: #000;
              margin: 20px;
            }
            .text-center {
              text-align: center;
            }
            h2, h4 {
              margin: 0;
            }
            table {
              width: 100%;
              border-collapse: collapse;
              margin-top: 20px;
            }
            th, td {
              border: 1px solid #000;
              padding: 8px;
              text-align: center;
            }
            @media print {
              .no-print {
                display: none;
              }
            }
          </style>
        </head>
        <body>
          ${printContents}
        </body>
      </html>
    `);
    newWin.document.close();
    newWin.focus();
    newWin.print();
    newWin.close();
  }
</script>
