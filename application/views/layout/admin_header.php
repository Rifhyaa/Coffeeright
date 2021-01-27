<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title><?= $title ?></title>
    <link href="<?= base_url('assets/') ?>css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" rel="stylesheet" crossorigin="anonymous" />
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
</head>

<body class="nav-fixed">
    <nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white" id="sidenavAccordion">
        <!-- Navbar Brand-->
        <!-- * * Tip * * You can use text or an image for your navbar brand.-->
        <!-- * * * * * * When using an image, we recommend the SVG format.-->
        <!-- * * * * * * Dimensions: Maximum height: 32px, maximum width: 240px-->
        <a class="navbar-brand" href="index-2.html">SB Admin Pro</a>
        <!-- Sidenav Toggle Button-->
        <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 mr-lg-2" id="sidebarToggle"><i data-feather="menu"></i></button>
        <!-- Navbar Items-->
        <ul class="navbar-nav align-items-center ml-auto">
            <!-- Alerts Dropdown-->
            <li class="nav-item dropdown no-caret d-none d-sm-block mr-3 dropdown-notifications">
                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownAlerts" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="bell"></i></a>
                <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownAlerts">
                    <h6 class="dropdown-header dropdown-notifications-header">
                        <i class="mr-2" data-feather="bell"></i>
                        Alerts Center
                    </h6>
                    <a class="dropdown-item dropdown-notifications-footer" href="#!">View All Alerts</a>
                </div>
            </li>
            <!-- Messages Dropdown-->
            <li class="nav-item dropdown no-caret d-none d-sm-block mr-3 dropdown-notifications">
                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownMessages" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="mail"></i></a>
                <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownMessages">
                    <h6 class="dropdown-header dropdown-notifications-header">
                        <i class="mr-2" data-feather="mail"></i>
                        Message Center
                    </h6>
                    <!-- Footer Link-->
                    <a class="dropdown-item dropdown-notifications-footer" href="#!">Read All Messages</a>
                </div>
            </li>
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
                    <a class="dropdown-item" href="#!">
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
                        <!-- Sidenav Menu Heading (Core)-->
                        <div class="sidenav-menu-heading">Core</div>
                        <!-- Sidenav Accordion (Dashboard)-->
                        <a class="nav-link collapsed <?= ($this->uri->segment(2) == 'dashboard' ? 'active' : '') ?>" href="<?= base_url('admin/dashboard'); ?>">
                            <div class="nav-link-icon"><i data-feather="activity"></i></div>
                            Dashboards
                        </a>
                        <!-- Sidenav Heading (Table)-->
                        <div class="sidenav-menu-heading">Table</div>
                        <!-- Sidenav Link (User)-->
                        <a class="nav-link <?= ($this->uri->segment(1) == 'user' ? 'active' : '') ?>" href="<?= base_url('user'); ?>">
                            <div class="nav-link-icon"><i class="fas fa-fw fa-user-tie"></i></div>
                            User
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
                        <a class="nav-link <?= ($this->uri->segment(1) == 'sub_kategori' ? 'active' : '') ?>" href="<?= base_url('sub_kategori'); ?>">
                            <div class="nav-link-icon"><i class="fas fa-fw fa-sitemap"></i></div>
                            Sub Kategori
                        </a>
                        <!-- Sidenav Link (Ulasan)-->
                        <a class="nav-link <?= ($this->uri->segment(1) == 'ulasan' ? 'active' : '') ?>" href="<?= base_url('ulasan'); ?>">
                            <div class="nav-link-icon"><i class="far fa-fw fa-sticky-note"></i></div>
                            Ulasan
                        </a>
                        <!-- Sidenav Link (Vendor)-->
                        <a class="nav-link <?= ($this->uri->segment(1) == 'vendor' ? 'active' : '') ?>" href="<?= base_url('vendor/index'); ?>">
                            <div class="nav-link-icon"><i class="fas fa-fw fa-truck"></i></div>
                            Vendor
                        </a>
                        <!-- Sidenav Heading (UI Toolkit)-->
                        <div class="sidenav-menu-heading">UI Toolkit</div>
                        <!-- Sidenav Accordion (Layout)-->
                        <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="nav-link-icon"><i data-feather="layout"></i></div>
                            Layout
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" data-parent="#accordionSidenav">
                            <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavLayout">
                                <!-- Nested Sidenav Accordion (Layout -> Navigation)-->
                                <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseLayoutSidenavVariations" aria-expanded="false" aria-controls="collapseLayoutSidenavVariations">
                                    Navigation
                                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseLayoutSidenavVariations" data-parent="#accordionSidenavLayout">
                                    <nav class="sidenav-menu-nested nav">
                                        <a class="nav-link" href="layout-static.html">Static Sidenav</a>
                                        <a class="nav-link" href="layout-dark.html">Dark Sidenav</a>
                                        <a class="nav-link" href="layout-rtl.html">RTL Layout</a>
                                    </nav>
                                </div>
                                <!-- Nested Sidenav Accordion (Layout -> Container Options)-->
                                <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseLayoutContainers" aria-expanded="false" aria-controls="collapseLayoutContainers">
                                    Container Options
                                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseLayoutContainers" data-parent="#accordionSidenavLayout">
                                    <nav class="sidenav-menu-nested nav">
                                        <a class="nav-link" href="layout-boxed.html">Boxed Layout</a>
                                        <a class="nav-link" href="layout-fluid.html">Fluid Layout</a>
                                    </nav>
                                </div>
                                <!-- Nested Sidenav Accordion (Layout -> Page Headers)-->
                                <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseLayoutsPageHeaders" aria-expanded="false" aria-controls="collapseLayoutsPageHeaders">
                                    Page Headers
                                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseLayoutsPageHeaders" data-parent="#accordionSidenavLayout">
                                    <nav class="sidenav-menu-nested nav">
                                        <a class="nav-link" href="header-simplified.html">Simplified</a>
                                        <a class="nav-link" href="header-compact.html">Compact</a>
                                        <a class="nav-link" href="header-overlap.html">Content Overlap</a>
                                        <a class="nav-link" href="header-breadcrumbs.html">Breadcrumbs</a>
                                        <a class="nav-link" href="header-light.html">Light</a>
                                    </nav>
                                </div>
                                <!-- Nested Sidenav Accordion (Layout -> Starter Layouts)-->
                                <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseLayoutsStarterTemplates" aria-expanded="false" aria-controls="collapseLayoutsStarterTemplates">
                                    Starter Layouts
                                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseLayoutsStarterTemplates" data-parent="#accordionSidenavLayout">
                                    <nav class="sidenav-menu-nested nav">
                                        <a class="nav-link" href="starter-default.html">Default</a>
                                        <a class="nav-link" href="starter-minimal.html">Minimal</a>
                                    </nav>
                                </div>
                            </nav>
                        </div>
                        <!-- Sidenav Accordion (Components)-->
                        <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseComponents" aria-expanded="false" aria-controls="collapseComponents">
                            <div class="nav-link-icon"><i data-feather="package"></i></div>
                            Components
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseComponents" data-parent="#accordionSidenav">
                            <nav class="sidenav-menu-nested nav">
                                <a class="nav-link" href="alerts.html">Alerts</a>
                                <a class="nav-link" href="avatars.html">Avatars</a>
                                <a class="nav-link" href="badges.html">Badges</a>
                                <a class="nav-link" href="buttons.html">Buttons</a>
                                <a class="nav-link" href="cards.html">
                                    Cards
                                    <span class="badge badge-primary-soft text-primary ml-auto">Updated</span>
                                </a>
                                <a class="nav-link" href="dropdowns.html">Dropdowns</a>
                                <a class="nav-link" href="forms.html">
                                    Forms
                                    <span class="badge badge-primary-soft text-primary ml-auto">Updated</span>
                                </a>
                                <a class="nav-link" href="modals.html">Modals</a>
                                <a class="nav-link" href="navigation.html">Navigation</a>
                                <a class="nav-link" href="progress.html">Progress</a>
                                <a class="nav-link" href="step.html">Step</a>
                                <a class="nav-link" href="timeline.html">Timeline</a>
                                <a class="nav-link" href="toasts.html">Toasts</a>
                                <a class="nav-link" href="tooltips.html">Tooltips</a>
                            </nav>
                        </div>
                        <!-- Sidenav Accordion (Utilities)-->
                        <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="false" aria-controls="collapseUtilities">
                            <div class="nav-link-icon"><i data-feather="tool"></i></div>
                            Utilities
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseUtilities" data-parent="#accordionSidenav">
                            <nav class="sidenav-menu-nested nav">
                                <a class="nav-link" href="animations.html">Animations</a>
                                <a class="nav-link" href="background.html">Background</a>
                                <a class="nav-link" href="borders.html">Borders</a>
                                <a class="nav-link" href="lift.html">Lift</a>
                                <a class="nav-link" href="shadows.html">Shadows</a>
                                <a class="nav-link" href="typography.html">Typography</a>
                            </nav>
                        </div>
                        <!-- Sidenav Heading (Addons)-->
                        <div class="sidenav-menu-heading">Plugins</div>
                        <!-- Sidenav Link (Charts)-->
                        <a class="nav-link" href="charts.html">
                            <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>
                            Charts
                        </a>
                        <!-- Sidenav Link (Tables)-->
                        <a class="nav-link" href="tables.html">
                            <div class="nav-link-icon"><i data-feather="filter"></i></div>
                            Tables
                        </a>
                    </div>
                </div>
                <!-- Sidenav Footer-->
                <div class="sidenav-footer">
                    <div class="sidenav-footer-content">
                        <div class="sidenav-footer-title"><?= $user['nama_pengguna']; ?></div>
                        <div class="sidenav-footer-title text-primary"><?php echo $user['id_role'] == 1 ? "Admin" : "Member" ?></div>
                    </div>
                </div>
            </nav>
        </div>