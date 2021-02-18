<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title><?= $title ?></title>
    <link href="<?= base_url('assets/'); ?>css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" rel="stylesheet" crossorigin="anonymous" />
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/coffeeright.png'); ?>" />
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
</head>

<body class="nav-fixed">
    <nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white" id="sidenavAccordion">
        <!-- Navbar Brand-->
        <!-- * * Tip * * You can use text or an image for your navbar brand.-->
        <!-- * * * * * * When using an image, we recommend the SVG format.-->
        <!-- * * * * * * Dimensions: Maximum height: 32px, maximum width: 240px-->
        <a class="navbar-brand" href="<?= base_url('user'); ?>">Coffeeright</a>
        <!-- Sidenav Toggle Button-->
        <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 mr-lg-2" id="sidebarToggle"><i data-feather="menu"></i></button>
        <!-- Navbar Items-->
        <ul class="navbar-nav align-items-center ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- User Dropdown-->
            <li class="nav-item dropdown no-caret mr-3 mr-lg-0 dropdown-user">
                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="img-fluid" src="<?= base_url('assets/img/upload/') . $user['foto']; ?>" />
                </a>
                <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                    <h6 class="dropdown-header d-flex align-items-center">
                        <img class="dropdown-user-img" src="<?= base_url('assets/img/upload/') . $user['foto']; ?>" />
                        <div class="dropdown-user-details">
                            <div class="dropdown-user-details-name"><?= $user['nama_pengguna']; ?></div>
                        </div>
                    </h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url('user'); ?>">
                        <div class="dropdown-item-icon"><i data-feather="user"></i></div>
                        My Profile
                    </a>
                    <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                        <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sidenav shadow-right sidenav-dark">
                <div class="sidenav-menu">
                    <div class="nav accordion" id="accordionSidenav">
                        <!-- Sidenav Menu Heading (Account)-->
                        <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                        <div class="sidenav-menu-heading d-sm-none">Account</div>
                        <!-- Sidenav Link (Alerts)-->
                        <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                        <a class="nav-link d-sm-none" href="#!">
                            <div class="nav-link-icon"><i data-feather="bell"></i></div>
                            Alerts
                            <span class="badge badge-warning-soft text-warning ml-auto">4 New!</span>
                        </a>
                        <!-- Sidenav Link (Messages)-->
                        <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                        <a class="nav-link d-sm-none" href="#!">
                            <div class="nav-link-icon"><i data-feather="mail"></i></div>
                            Messages
                            <span class="badge badge-success-soft text-success ml-auto">2 New!</span>
                        </a>
                        <?php if ($user['id_role'] == '1') : ?>
                            <!-- Sidenav Menu Heading (Core)-->
                            <div class="sidenav-menu-heading">Core</div>
                            <!-- Sidenav Accordion (Dashboard)-->
                            <a class="nav-link collapsed <?= ($this->uri->segment(2) == 'dashboard' ? 'active' : '') ?>" href="<?= base_url('user/dashboard'); ?>">
                                <div class="nav-link-icon"><i class="fas fa-fw fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <!-- Sidenav Heading (Table)-->
                            <div class="sidenav-menu-heading">Tabel</div>
                            <!-- Sidenav Link (User)-->
                            <a class="nav-link <?= ($this->uri->segment(1) == 'pengguna' ? 'active' : '') ?>" href="<?= base_url('pengguna'); ?>">
                                <div class="nav-link-icon"><i class="fas fa-fw fa-user-tie"></i></div>
                                Pengguna
                            </a>
                            <!-- Sidenav Link (Produk)-->
                            <a class="nav-link <?= ($this->uri->segment(1) == 'produk' ? 'active' : '') ?>" href="<?= base_url('produk'); ?>">
                                <div class="nav-link-icon"><i class="fas fa-fw fa-cubes"></i></div>
                                Produk
                            </a>
                            <!-- Sidenav Link (Kategori)-->
                            <a class="nav-link <?= ($this->uri->segment(1) == 'kategori' ? 'active' : '') ?>" href="<?= base_url('kategori'); ?>">
                                <div class="nav-link-icon"><i class="fas fa-fw fa-list-ul"></i></div>
                                Kategori
                            </a>
                            <!-- Sidenav Link (Sub Kategori)-->
                            <a class="nav-link <?= ($this->uri->segment(1) == 'subkategori' ? 'active' : '') ?>" href="<?= base_url('subkategori'); ?>">
                                <div class="nav-link-icon"><i class="fas fa-fw fa-sitemap"></i></div>
                                Sub Kategori
                            </a>
                            <!-- Sidenav Link (Ulasan)-->
                            <a class="nav-link <?= ($this->uri->segment(1) == 'ulasan' ? 'active' : '') ?>" href="<?= base_url('ulasan'); ?>">
                                <div class="nav-link-icon"><i class="far fa-fw fa-sticky-note"></i></div>
                                Ulasan
                            </a>
                            <!-- Sidenav Link (Vendor)-->
                            <a class="nav-link <?= ($this->uri->segment(1) == 'vendor' ? 'active' : '') ?>" href="<?= base_url('vendor'); ?>">
                                <div class="nav-link-icon"><i class="fas fa-fw fa-truck"></i></div>
                                Vendor
                            </a>
                            <!-- Sidenav Link (Kota)-->
                            <a class="nav-link <?= ($this->uri->segment(1) == 'kota' ? 'active' : '') ?>" href="<?= base_url('kota'); ?>">
                                <div class="nav-link-icon"><i class="fas fa-fw fa-building"></i></div>
                                Kota
                            </a>
                            <!-- Sidenav Heading (Transaksi)-->
                            <div class="sidenav-menu-heading">Transaksi</div>
                            <!-- Sidenav Link (Kasir)-->
                            <a class="nav-link <?= ($this->uri->segment(1) == 'trkasir' ? 'active' : '') ?>" href="<?= base_url('trkasir'); ?>">
                                <div class="nav-link-icon"><i class="fas fa-fw fa-dolly"></i></div>
                                Kasir
                            </a>
                            <!-- Sidenav Link (Barang Masuk)-->
                            <a class="nav-link <?= ($this->uri->segment(1) == 'barangmasuk' ? 'active' : '') ?>" href="<?= base_url('barangmasuk'); ?>">
                                <div class="nav-link-icon"><i class="fas fa-fw fa-truck-loading"></i></div>
                                Barang Masuk
                            </a>
                            <!-- Sidenav Link (Barang Keluar)-->
                            <a class="nav-link <?= ($this->uri->segment(1) == 'barangkeluar' ? 'active' : '') ?>" href="<?= base_url('barangkeluar'); ?>">
                                <div class="nav-link-icon"><i class="fas fa-fw fa-dolly"></i></div>
                                Barang Keluar
                            </a>
                            <!-- Sidenav Heading (Laporan)-->
                            <div class="sidenav-menu-heading">Laporan</div>
                            <!-- Sidenav Link (Laporan Peminjaman)-->
                            <a class="nav-link" href="<?= site_url('lapbarangkeluar') ?>">
                                <div class="nav-link-icon"><i class="fas fa-fw fa-chart-bar"></i></div>
                                Laporan Barang Keluar
                            </a>
                            <!-- Sidenav Link (Laporan Pengadaan)-->
                            <a class="nav-link" href="<?= site_url('lapbarangmasuk') ?>">
                                <div class="nav-link-icon"><i class="fas fa-fw fa-chart-line"></i></div>
                                Laporan Barang Masuk
                            </a>

                        <?php else : ?>
                            <!-- Sidenav Menu Heading (Core)-->
                            <div class="sidenav-menu-heading">Core</div>
                            <a class="nav-link <?= ($this->uri->segment(2) == 'index' ? 'active' : '') ?>" href="<?= base_url('kurir'); ?>">
                                <div class="nav-link-icon"><i class="fas fa-fw fa-shipping-fast"></i></div>
                                Dashboard
                            </a>
                            <!-- Sidenav Heading (Transaksi)-->
                            <div class="sidenav-menu-heading">Transaksi</div>
                            <!-- Sidenav Link (Pengiriman)-->
                            <a class="nav-link <?= ($this->uri->segment(2) == 'index' ? 'active' : '') ?>" href="<?= base_url('kurir/daftarpickup'); ?>">
                                <div class="nav-link-icon"><i class="fas fa-fw fa-shipping-fast"></i></div>
                                Daftar Pickup
                            </a>
                            <!-- Sidenav Link (Pengiriman)-->
                            <a class="nav-link <?= ($this->uri->segment(2) == 'index' ? 'active' : '') ?>" href="<?= base_url('kurir/daftarpengiriman'); ?>">
                                <div class="nav-link-icon"><i class="fas fa-fw fa-shipping-fast"></i></div>
                                Daftar Pengiriman
                            </a>
                            <!-- Sidenav Link (Pengiriman)-->
                            <a class="nav-link <?= ($this->uri->segment(2) == 'index' ? 'active' : '') ?>" href="<?= base_url('kurir/konfirmasipengiriman'); ?>">
                                <div class="nav-link-icon"><i class="fas fa-fw fa-shipping-fast"></i></div>
                                Konfirmasi Pengiriman
                            </a>
                        <?php endif; ?>
                        <!-- Sidenav Heading (Pengguna Aplikasi)-->
                        <div class="sidenav-menu-heading">Pengguna</div>
                        <!-- Sidenav Link (User)-->
                        <a class="nav-link <?= ($this->uri->segment(2) == 'index' ? 'active' : '') ?>" href="<?= base_url('user'); ?>">
                            <div class="nav-link-icon"><i class="fas fa-fw fa-user-tie"></i></div>
                            Profil Saya
                        </a>
                        <!-- Sidenav Link (User)-->
                        <!-- <a class="nav-link <?= ($this->uri->segment(2) == 'security' ? 'active' : '') ?>" href="<?= base_url('user/security'); ?>">
                            <div class="nav-link-icon"><i class="fas fa-fw fa-key"></i></div>
                            Keamanan
                        </a> -->
                    </div>
                </div>
                <!-- Sidenav Footer-->
                <div class="sidenav-footer">
                    <div class="sidenav-footer-content">
                        <div class="sidenav-footer-title"><?= $user['nama_pengguna']; ?></div>
                        <div class="sidenav-footer-title text-primary"><?= check_role($user['id_role']); ?></div>
                    </div>
                </div>
            </nav>
        </div>