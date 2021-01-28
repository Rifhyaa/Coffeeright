<div id="layoutSidenav_content">
    <main>
        <!-- Main page content-->
        <div class="container mt-5">
            <!-- Custom page header alternative example-->
            <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
                <div class="mr-4 mb-3 mb-sm-0">
                    <h1 class="mb-0">Dashboard</h1>
                    <div class="small">
                        <span class="font-weight-500 text-primary"><?= date("l"); ?></span>
                        &#xB7; <?= date('F d, Y', time()); ?> &#xB7; <?= date('h:i A', time()); ?>
                    </div>
                </div>
            </div>
            <!-- Illustration dashboard card example-->
            <div class="card mb-4 mt-5">
                <div class="card-body p-5">
                    <div class="row align-items-center justify-content-between">
                        <div class="col">
                            <h2 class="text-primary">Selamat datang, <?= $user['nama_pengguna']; ?> </h2>
                            <p class="text-gray-700">Semoga harimu menyenangkan. Jangan lupa menjaga jarak, memakai masker, dan menetapkan protokol kesehatan di dalam kantor. </p>
                        </div>
                        <div class="col d-none d-lg-block mt-xxl-n4"><img class="img-fluid px-xl-4 mt-xxl-n5" src="<?= base_url('/'); ?>assets/img/illustrations/statistics.svg" /></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-md-6 mb-4">
                    <!-- Dashboard info widget 1-->
                    <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-primary h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <div class="small font-weight-bold text-primary mb-1">User</div>
                                    <div class="h4"><?= $totalUser; ?></div>
                                </div>
                                <div class="ml-2"><i class="fas fa-user-tie fa-2x text-gray-200"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <!-- Dashboard info widget 2-->
                    <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-secondary h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <div class="small font-weight-bold text-secondary mb-1">Produk</div>
                                    <div class="h4"><?= $totalProduk; ?></div>
                                </div>
                                <div class="ml-2"><i class="fas fa-tag fa-2x text-gray-200"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <!-- Dashboard info widget 3-->
                    <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-success h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <div class="small font-weight-bold text-success mb-1">Vendor</div>
                                    <div class="h4"><?= $totalVendor; ?></div>
                                </div>
                                <div class="ml-2"><i class="fas fa-mouse-pointer fa-2x text-gray-200"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <!-- Dashboard info widget 4-->
                    <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-info h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <div class="small font-weight-bold text-info mb-1">Ulasan</div>
                                    <div class="h4"><?= $totalUlasan; ?></div>
                                </div>
                                <div class="ml-2"><i class="fas fa-percentage fa-2x text-gray-200"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <!-- Illustration card example-->
                    <div class="card mb-4">
                        <div class="card-body text-center p-5">
                            <img class="img-fluid mb-5" src="<?= base_url('/'); ?>assets/img/illustrations/data-report.svg" />
                            <h4>Report generation</h4>
                            <p class="mb-4">Ready to get started? Let us know now! It&apos;s time to start building that dashboard you&apos;ve been waiting to create!</p>
                            <a class="btn btn-primary p-3" href="#!">Continue</a>
                        </div>
                    </div>
                    <!-- Report summary card example-->
                    <div class="card mb-4">
                        <div class="card-header border-bottom-0">Affiliate Reports</div>
                        <div class="list-group list-group-flush small">
                            <a class="list-group-item list-group-item-action" href="#!">
                                <i class="fas fa-dollar-sign fa-fw text-blue mr-2"></i>
                                Earnings Reports
                            </a>
                            <a class="list-group-item list-group-item-action" href="#!">
                                <i class="fas fa-tag fa-fw text-purple mr-2"></i>
                                Average Sale Price
                            </a>
                            <a class="list-group-item list-group-item-action" href="#!">
                                <i class="fas fa-mouse-pointer fa-fw text-green mr-2"></i>
                                Engagement (Clicks &amp; Impressions)
                            </a>
                            <a class="list-group-item list-group-item-action" href="#!">
                                <i class="fas fa-percentage fa-fw text-yellow mr-2"></i>
                                Conversion Rate
                            </a>
                            <a class="list-group-item list-group-item-action" href="#!">
                                <i class="fas fa-chart-pie fa-fw text-pink mr-2"></i>
                                Segments
                            </a>
                        </div>
                        <div class="card-footer border-top-0">
                            <a class="text-xs d-flex align-items-center justify-content-between" href="#!">
                                View More Reports
                                <i class="fas fa-long-arrow-alt-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 mb-4">
                    <!-- Area chart example-->
                    <div class="card mb-4">
                        <div class="card-header">Revenue Summary</div>
                        <div class="card-body">
                            <div class="chart-area"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Bar chart example-->
                            <div class="card h-100">
                                <div class="card-header">Sales Reporting</div>
                                <div class="card-body d-flex flex-column justify-content-center">
                                    <div class="chart-bar"><canvas id="myBarChart" width="100%" height="30"></canvas></div>
                                </div>
                                <div class="card-footer">
                                    <a class="text-xs d-flex align-items-center justify-content-between" href="#!">
                                        View More Reports
                                        <i class="fas fa-long-arrow-alt-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!-- Pie chart example-->
                            <div class="card h-100">
                                <div class="card-header">Traffic Sources</div>
                                <div class="card-body">
                                    <div class="chart-pie mb-4"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                                    <div class="list-group list-group-flush">
                                        <div class="list-group-item d-flex align-items-center justify-content-between small px-0 py-2">
                                            <div class="mr-3">
                                                <i class="fas fa-circle fa-sm mr-1 text-blue"></i>
                                                Direct
                                            </div>
                                            <div class="font-weight-500 text-dark">55%</div>
                                        </div>
                                        <div class="list-group-item d-flex align-items-center justify-content-between small px-0 py-2">
                                            <div class="mr-3">
                                                <i class="fas fa-circle fa-sm mr-1 text-purple"></i>
                                                Social
                                            </div>
                                            <div class="font-weight-500 text-dark">15%</div>
                                        </div>
                                        <div class="list-group-item d-flex align-items-center justify-content-between small px-0 py-2">
                                            <div class="mr-3">
                                                <i class="fas fa-circle fa-sm mr-1 text-green"></i>
                                                Referral
                                            </div>
                                            <div class="font-weight-500 text-dark">30%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/'); ?>js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/'); ?>/demo/chart-area-demo.js"></script>
    <script src="<?= base_url('assets/'); ?>/demo/chart-bar-demo.js"></script>
    <script src="<?= base_url('assets/'); ?>/demo/chart-pie-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/'); ?>/demo/date-range-picker-demo.js"></script>

    </body>

    </html>