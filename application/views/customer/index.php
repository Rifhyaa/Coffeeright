<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <title>Coffee Right - Find Your Perfect Taste</title>
  <meta content="" name="description" />
  <meta content="" name="keywords" />

  <!-- Favicons -->
  <link href="<?php echo base_url('assets/customer/img/favicon.png') ?>" rel="icon" />
  <link href="<?php echo base_url('assets/customer/img/apple-touch-icon.png') ?>" rel="apple-touch-icon" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url('assets/customer/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/customer/vendor/icofont/icofont.min.css') ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/customer/vendor/boxicons/css/boxicons.min.css') ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/customer/vendor/animate.css/animate.min.css') ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/customer/vendor/remixicon/remixicon.css') ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/customer/vendor/owl.carousel/assets/owl.carousel.min.css') ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/customer/vendor/venobox/venobox.css') ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/customer/vendor/aos/aos.css') ?>" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url('assets/customer/css/style.css') ?>" rel="stylesheet" />

  <!-- =======================================================
    * Template Name: Anyar - v2.2.0
    * Template URL: https://bootstrapmade.com/anyar-free-multipurpose-one-page-bootstrap-theme/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <h1 class="logo mr-auto">
        <a href="#header" class="scrollto"> Coffee <i class="fas fa-mug-hot"></i> Rights</a>
      </h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="#header" class="logo mr-auto scrollto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu">
        <ul>
          <!-- <li><a href="#tentang">Tentang</a></li>
          <li></li> -->
          <li class="drop-down ul">
            <a href="#"><i class="fas fa-bars" style="color: white"></i></a>
            <ul>
              <li><a href="<?= base_url(''); ?>">Info Akun</a></li>
              <li><a href="<?= base_url('Catalog'); ?>">Cari Produk</a></li>
              <li><a href="<?= base_url('keranjang'); ?>">Keranjang</a></li>
              <li><a href="<?= base_url('TransaksiBeli'); ?>">Pesanan Saya</a></li>
            </ul>
          </li>
          <li>
            <a>
              <i class="fas fa-user" style="color:white"></i>
            </a>
          </li>
          <li>
            <a style="color:white"><?= $user['nama_pengguna']; ?></a>
          </li>
        </ul>
      </nav>
      <!-- .nav-menu -->
    </div>
  </header>
  <!-- End Header -->
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
            <!-- End Hero -->
            <!-- ======= Breadcrumbs ======= -->
            <div class="breadcrumbs">
              <div class="container">
                <ol>
                  <li><a href="">Home</a></li>
                  <li><?php echo $title  ?></li>
                </ol>
                <h2><?php echo $title ?></h2>
              </div>
            </div>
            <!-- End Breadcrumbs -->
            <!-- ======= Temukan Section ======= -->
            <section id="temukan" class="portfoio">
              <div class="container" data-aos="fade-up">

                <div class="row portfolio-container">
                  <div class="col-lg-4 col-md-6 portfolio-item">
                    <img src="<?php echo base_url('assets/customer/img/product/Are-Coffee-Bag-Valves-Important-oxidation-bmc.jpg') ?>" class="img-fluid" alt="" />
                    <a href="" class="btn portfolio-info align-items-center">
                      <h4>Aceh Gayo 200g </h4>
                    </a>
                  </div>

                  <div class="col-lg-4 col-md-6 portfolio-item">
                    <img src="<?php echo base_url('assets/customer/img/product/Are-Coffee-Bag-Valves-Important-oxidation-bmc.jpg') ?>" class="img-fluid" alt="" />
                    <a href="" class="btn portfolio-info align-items-center">
                      <h4>Java Black 200g </h4>
                    </a>
                  </div>

                  <div class="col-lg-4 col-md-6 portfolio-item">
                    <img src="<?php echo base_url('assets/customer/img/product/Are-Coffee-Bag-Valves-Important-oxidation-bmc.jpg') ?>" class="img-fluid" alt="" />
                    <a href="" class="btn portfolio-info align-items-center">
                      <h4>Kerinci Kayu 200g </h4>
                    </a>
                  </div>

                  <div class="col-lg-4 col-md-6 portfolio-item">
                    <img src="<?php echo base_url('assets/customer/img/product/Are-Coffee-Bag-Valves-Important-oxidation-bmc.jpg') ?>" class="img-fluid" alt="" />
                    <a href="" class="btn portfolio-info align-items-center">
                      <h4>Malabar 200g </h4>
                    </a>
                  </div>

                  <div class="col-lg-4 col-md-6 portfolio-item">
                    <img src="<?php echo base_url('assets/customer/img/product/Are-Coffee-Bag-Valves-Important-oxidation-bmc.jpg') ?>" class="img-fluid" alt="" />
                    <a href="" class="btn portfolio-info align-items-center">
                      <h4>Java Ijen 200g </h4>
                    </a>
                  </div>

                  <div class="col-lg-4 col-md-6 portfolio-item">
                    <img src="<?php echo base_url('assets/customer/img/product/Are-Coffee-Bag-Valves-Important-oxidation-bmc.jpg') ?>" class="img-fluid" alt="" />
                    <a href="" class="btn portfolio-info align-items-center">
                      <h4>Bali Kintamani 200g </h4>
                    </a>
                  </div>

                </div>
              </div>
            </section>
            <!-- End Temukan Section -->
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- End #main -->
  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Layanan Kami</h4>
            <ul>
              <li>
                <i class="bx bx-chevron-right"></i> <a href="#">Tentang</a>
              </li>
              <li>
                <i class="bx bx-chevron-right"></i> <a href="#">Temukan Produk</a>
              </li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Kontak Kami</h4>
            <p>
              Indonesia <br />
              Jakarta Utara, Sunter<br />
              Indonesia <br /><br />
              <strong>Phone:</strong> +628972178381<br />
              <strong>Email:</strong> info@coffeerights.com<br />
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>Tentang Coffee Rights</h3>
            <p>
              Coffee Rights adalah situs jual beli
              resmi dari Toko Kopi Coffee Rights
              yang menjual berbagai kebutuhan dan perlengkapan
              Membuat kopi untuk pribadi ataupun bisnis anda
            </p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram">
                <i class="bx bxl-instagram"></i>
              </a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span> Coffee Rights </span></strong> All Rights
        Reserved
      </div>
    </div>
  </footer>
  <!-- End Footer -->

  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url('assets/customer/vendor/jquery/jquery.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/customer/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/customer/vendor/jquery.easing/jquery.easing.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/customer/vendor/php-email-form/validate.js') ?>"></script>
  <script src="<?php echo base_url('assets/customer/vendor/owl.carousel/owl.carousel.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/customer/vendor/venobox/venobox.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/customer/vendor/isotope-layout/isotope.pkgd.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/customer/vendor/aos/aos.js') ?>"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url('assets/customer/js/main.js') ?>"></script>
</body>

</html>