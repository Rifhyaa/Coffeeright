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
                    <!-- <li><a href="#tentang">Tentang</a></li> -->
                    <!-- <li></li> -->
                    <li class="drop-down ul">
                        <a href="#"><i class="fas fa-bars" style="color: white"></i></a>
                        <ul>
                            <li><a href="<?= base_url('produk'); ?>">Info Akun</a></li>
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
                        <!-- ======= CTA ======= -->
                        <div id="cta" class="cta">
                            <!-- <div class="container"></div> -->
                        </div>
                        <!-- End cta -->
                        <!-- ======= Breadcrumbs ======= -->
                        <div class="breadcrumbs">
                            <div class="container">
                                <ol>
                                    <li><a href="">Home</a></li>
                                    <li><?php echo $title ?></li>
                                </ol>
                                <h2><?php echo $title ?></h2>
                            </div>
                        </div>
                        <!-- End Breadcrumbs -->
                        <!-- ======= content ======= -->

                        <!-- End Content -->