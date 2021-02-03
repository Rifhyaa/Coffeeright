<div id="layoutSidenav_content">
    <!-- Main page content-->
    <main>
        <header>
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb bg-white">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">User</li>
                    <li class="breadcrumb-item">Kurir</li>
                    <li class="breadcrumb-item text-blue" aria-current="page">Konfirmasi Penerimaan</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->
        </header>
        <div class="container-fluid mt-4">
            <div class="card mb-4">
                <div class="card-header">
                    Konfirmasi Pengiriman
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="datatable">
                            <table class="table table-bordered table-hover table-striped nowrap" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="text-center min-wd-50">No</th>
                                        <th class="text-center">ID Transaksi</th>
                                        <th class="text-center">Tanggal</th>
                                        <th class="text-center">Tujuan</th>
                                        <th class="text-center">Total Harga</th>
                                        <th class="text-center min-wd-50">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $num = 1; ?>
                                    <?php foreach ($trPembelian as $tr) : ?>
                                        <tr>
                                            <td> <?= $num++; ?> </td>
                                            <td> <?= $tr->id_trpembelian; ?> </td>
                                            <td> <?= $tr->tgl_transaksi; ?> </td>
                                            <td>
                                                <?php foreach ($mskota as $row) {
                                                    if ($tr->id_kota == $row->id_kota) {
                                                        echo $row->nama_kota;
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td> <?= $tr->total_harga; ?> </td>
                                            <td class="text-center min-wd-50">
                                                <a href="<?php echo site_url('kurir/simpan_konfirmasi/' . $tr->id_trpembelian) ?>" onclick="return confirm('Apa anda yakin barang sudah diterima pembeli');" data-toggle="tooltip" title="Konfirmasi Barang Sudah Diterima Pembeli" class="btn btn-datatable btn-icon btn-transparent-dark mr-2" te><i data-feather="check-square"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>