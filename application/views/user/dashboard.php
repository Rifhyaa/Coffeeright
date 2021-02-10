<div id="layoutSidenav_content">
    <main>
        <!-- Main page content-->
        <div class="container mt-5">
            <!-- Custom page header alternative example-->
            <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
                <div class="mr-4 mb-3 mb-sm-0">
                    <h1 class="mb-0">Dashboard</h1>
                    <div class="small">
                        <span class="font-weight-500 text-primary"><?= hariIndo(date("l")); ?></span>
                        &#xB7; <?= date('d ') . bulanIndo(date('F')) . date(' Y'); ?> &#xB7; <?= date('h:i'); ?>
                    </div>
                </div>
            </div>
            <!-- Illustration dashboard card example-->
            <div class="card card-waves mb-4 mt-5">
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
                                    <div class="small font-weight-bold text-primary mb-1">Penguna</div>
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
                                    <div class="small font-weight-bold text-info mb-1">Kota</div>
                                    <div class="h4"><?= $totalKota; ?></div>
                                </div>
                                <div class="ml-2"><i class="fas fa-percentage fa-2x text-gray-200"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="card mb-4">
                        <div class="card-header">
                            Daftar 10 Produk Terlaris
                        </div>
                        <div class="card-body">
                            <div class="datatable">
                                <table class="table table-hover table-striped" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-blue">
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $num = 1; ?>
                                        <?php foreach ($topProduk as $produk) : ?>
                                            <tr>
                                                <td> <?= $num++; ?> </td>
                                                <td> <?= $produk->nama_produk; ?> </td>
                                                <td> <?= $produk->Jumlah; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card mb-4">
                        <div class="card-header">
                            Daftar Produk Habis
                        </div>
                        <div class="card-body">
                            <div class="datatable">
                                <table class="table table-hover table-striped" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-blue">
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($produkHabis == null)
                                            echo "<tr> 
                                                    <td></td><td>Tidak ada produk yang habis</td>
                                            </tr>"
                                        ?>
                                        <?php foreach ($produkHabis as $habis) : ?>
                                            <tr>
                                                <td> <?= $num++; ?> </td>
                                                <td> <?= $habis->nama_produk; ?> </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="card mb-4">
                        <div class="card-header text-dark">
                            Tipe Pemesanan
                        </div>
                        <div class="card-body">
                            <div class="datatable">
                                <table class="table table-hover table-striped" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-blue">
                                            <th>No</th>
                                            <th>Pemesanan</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Pemesanan Offline</td>
                                            <td><?= $poffline; ?></td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Pemesanan Online</td>
                                            <td><?= $ponline; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card mb-4">
                        <div class="card-header text-dark">Grafik Pemesanan</div>
                        <div class="card-body">
                            <div class="chart-pie mb-4"><canvas id="chartStatusPeminjaman" width="100%" height="500"></canvas></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
</div>
</div>
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Tekan tombol 'Logout' untuk mengakhiri sesi anda.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/'); ?>js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" crossorigin="anonymous"></script>
<!-- <script src="<?= base_url('assets/'); ?>/demo/chart-area-demo.js"></script>
<script src="<?= base_url('assets/'); ?>/demo/chart-bar-demo.js"></script>
<script src="<?= base_url('assets/'); ?>/demo/chart-pie-demo.js"></script> -->
<script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/'); ?>/demo/date-range-picker-demo.js"></script>

<script>
    var jmlPesanan = document.getElementById('chartStatusPeminjaman').getContext('2d');
    var dtStatus = [];
    var dtCount = [];

    dtStatus.push(" Pemesanan Offline");
    dtCount.push(<?= $poffline; ?>);

    dtStatus.push(" Pemesanan Online");
    dtCount.push(<?= $ponline; ?>);


    var adminChart = new Chart(jmlPesanan, {
        type: 'doughnut',
        data: {
            labels: dtStatus,
            datasets: [{
                label: dtStatus,
                backgroundColor: [
                    '#0061F2', '#6900C7'
                ],
                borderColor: '#fff',
                data: dtCount,
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutoutPercentage: '60',
            legend: {
                display: true,
                position: 'right',
                align: 'center',
                labels: {
                    fontColor: 'rgba(125, 125, 125, 1)'
                }
            },
        }
    });
</script>
</body>

</html>