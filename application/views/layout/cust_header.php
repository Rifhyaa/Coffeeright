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
                <a href="<?= base_url('Customer'); ?>" class="scrollto"> Coffee <i class="fas fa-mug-hot"></i> Right</a>
            </h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="#header" class="logo mr-auto scrollto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav class="nav-menu">
                <ul>
                    <li class="justify-content-center align-self-center">
                        <div class="row form-rounded" style="background-color: white; margin-right: 20px;">
                            <div class="col-lg-15 ">
                                <form action="" method="post">
                                    <input type="text" name="email" style="border:none; border-radius: 1rem;">
                                    <button type="submit" class="btn btn-prime form-rounded"><i class="fas fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </li>
                    <li class="justify-content-center align-self-center">
                        <a href="<?= base_url('keranjang'); ?>">
                            <i class="fas fa-shopping-cart" style="color:white"></i>
                        </a>
                    </li>
                    <li class="justify-content-center align-self-center">
                        <i class="fas fa-user" style="color:white"></i>
                    </li>
                    <li class="drop-down ul justify-content-center align-self-center">
                        <?php if ($user['nama_pengguna'] != null) { ?>
                            <a style="color:white"><?= $user['nama_pengguna']; ?></a>
                        <?php } else { ?>
                            <a style="color:white" href="<?= base_url('auth'); ?>">Login</a>
                        <?php } ?>
                        <ul>
                            <li><a href="<?= base_url('User/editCust'); ?>">Info Akun</a></li>
                            <li><a href="<?= base_url('Catalog'); ?>">Cari Produk</a></li>
                            <li><a href="<?= base_url('TransaksiBeli'); ?>">Pesanan Saya</a></li>
                            <li><a href="<?= base_url('Auth/logout'); ?>">Keluar</a></li>
                        </ul>
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
                        <!-- ======= content ======= -->