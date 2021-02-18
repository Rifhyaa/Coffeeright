<body>
  <main id="main">
    <div id="layoutSidenav">
      <div class="layoutSidenav_content">
        <div class="container-fluid">
          <div class="card mb-4">
            <section id="hero" class="d-flex justify-cntent-center align-items-center">
              <div id="heroCarousel" class="container carousel carousel-fade" data-ride="carousel">
                <!-- Slide ganti gambar sama tulisan 3 konten utama  -->
                <!-- Slide 1 -->
                <div class="carousel-item active">
                  <div class="carousel-container">
                    <h2 class="animate__animated animate__fadeInDown">
                      Selamat Datang di <span>Coffee Rights</span>
                    </h2>
                    <p class="animate__animated animate__fadeInUp">
                      Coffee Rights adalah situs jual beli
                      resmi dari Toko Kopi Coffee Rights
                      yang menjual berbagai kebutuhan dan perlengkapan
                      Membuat kopi untuk pribadi ataupun bisnis anda
                    </p>
                    <a href="#tentang" class="btn-get-started animate__animated animate__fadeInUp scrollto">Lebih Lanjut</a>
                  </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item">
                  <div class="carousel-container">
                    <h2 class="animate__animated animate__fadeInDown">
                      Produk Kebutuhan dan Perlengkapan Kopi
                    </h2>
                    <p class="animate__animated animate__fadeInUp">
                      Cari kebutuhan dan perlengkapan
                      membuat kopi untuk bisnis anda
                    </p>
                  </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item">
                  <div class="carousel-container">
                    <h2 class="animate__animated animate__fadeInDown">
                      Temukan Rasa yang Paling Sempurna
                    </h2>
                    <p class="animate__animated animate__fadeInUp">
                      Cari Produk biji kopi yang
                      sesuai dengan selera anda
                      dengan kualitas terbaik
                    </p>
                  </div>
                </div>

                <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>

                <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
                  <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </section>
            <!-- ======= Temukan Section ======= -->
            <div class="container-fluid">
              <div id="temukan" class="portfoio">
                <div class="container" data-aos="fade-up">
                  <div class="row portfolio-container">

                    <?php $i = 1; ?>
                    <?php foreach ($msproduk as $produk) : ?>
                      <?php if ($i <= 6) : ?>
                        <div class="col-lg-4 portfolio-item">
                          <img src="<?= base_url("assets/img/upload/" . $produk->foto) ?>" class="img-fluid" alt="" />
                          <a href="<?= site_url('Catalog/detail/' . $produk->id_produk) ?>" class="btn portfolio-info align-items-center">
                            <h4><?= $produk->nama_produk ?></h4>
                          </a>
                        </div>
                      <?php endif; ?>
                    <?php $i = $i + 1;
                    endforeach; ?>
                  </div>
                </div>
              </div>
              <!-- End Temukan Section -->
            </div>
          </div>
        </div>
      </div>
  </main>