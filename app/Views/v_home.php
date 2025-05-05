<div class="col-lg-9">
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://media.istockphoto.com/id/1326906006/id/vektor/desain-latar-belakang-islam-dengan-ilustrasi-siluet-masjid-dapat-digunakan-untuk-kartu.jpg?s=2048x2048&w=is&k=20&c=8WWX_LQrNJBtH1wGElU2muF1IEQYvFunjbX7pD8-pg4=" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://media.istockphoto.com/id/1326906006/id/vektor/desain-latar-belakang-islam-dengan-ilustrasi-siluet-masjid-dapat-digunakan-untuk-kartu.jpg?s=2048x2048&w=is&k=20&c=8WWX_LQrNJBtH1wGElU2muF1IEQYvFunjbX7pD8-pg4=" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://media.istockphoto.com/id/1326906006/id/vektor/desain-latar-belakang-islam-dengan-ilustrasi-siluet-masjid-dapat-digunakan-untuk-kartu.jpg?s=2048x2048&w=is&k=20&c=8WWX_LQrNJBtH1wGElU2muF1IEQYvFunjbX7pD8-pg4=" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </button>
</div>
<br>
</div>
<div class="col-lg-3">
   <div class="card card-outline card-success">
     <div class="card-header">
       <h3 class="card-title text-success"> <b><?= $waktu['data']['lokasi'] ?></b></h3>
     </div>
     <div class="card-body p-3">
     <ul class="products-list product-list-in-card pl-2 pr-2">
                  <li class="item">
                    <div class="product-img">
                      <i class="far fa-clock fa-3x text-success"></i>
                    </div>
                    <div class="product-info">
                      <a class="product-title">Subuh</a>
                      <span class="product-description">
                        <?= $waktu['data']['jadwal']['subuh']?>
                      </span>
                    </div>
                  </li>

                  <li class="item">
                    <div class="product-img">
                      <i class="far fa-clock fa-3x text-success"></i>
                    </div>
                    <div class="product-info">
                      <a class="product-title">Dhuha</a>
                      <span class="product-description">
                        <?= $waktu['data']['jadwal']['dhuha']?>
                      </span>
                    </div>
                  </li>
                  <li class="item">
                    <div class="product-img">
                      <i class="far fa-clock fa-3x text-success"></i>
                    </div>
                    <div class="product-info">
                      <a class="product-title">Dzuhur</a>
                      <span class="product-description">
                        <?= $waktu['data']['jadwal']['dzuhur']?>
                      </span>
                    </div>
                  </li>

                  <li class="item">
                    <div class="product-img">
                      <i class="far fa-clock fa-3x text-success"></i>
                    </div>
                    <div class="product-info">
                      <a class="product-title">Ashar</a>
                      <span class="product-description">
                        <?= $waktu['data']['jadwal']['ashar']?>
                      </span>
                    </div>
                  </li>

                  <li class="item">
                    <div class="product-img">
                      <i class="far fa-clock fa-3x text-success"></i>
                    </div>
                    <div class="product-info">
                      <a class="product-title">Maghrib</a>
                      <span class="product-description">
                        <?= $waktu['data']['jadwal']['maghrib']?>
                      </span>
                    </div>
                  </li>

                  <li class="item">
                    <div class="product-img">
                      <i class="far fa-clock fa-3x text-success"></i>
                    </div>
                    <div class="product-info">
                      <a class="product-title">Isya</a>
                      <span class="product-description">
                        <?= $waktu['data']['jadwal']['isya']?>
                      </span>
                    </div>
                  </li>
                </ul>
                <div class="text-center">
                <b class="text-success"><?= $waktu['data']['jadwal']['tanggal']?></b>
                </div>
     </div>
   </div>
</div>



<div class="col-lg-12">
        <div class="row">

          <div class="col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-money-bill-wave"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Sisa Kas</span>
                <span class="info-box-number">
                  10
                  <small>%</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-bill-wave"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Kas Masuk</span>
                <span class="info-box-number">41,410</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-money-bill-wave"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Kas Keluar</span>
                <span class="info-box-number">760</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </div>
        </div>

<div class="col-md-12">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Collapsable</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                The body of the card
              </div>
              <!-- /.card-body -->
            </div>

        <!-- /.row -->