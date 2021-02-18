<div id="layoutSidenav_content">
    <!-- Main page content-->
    <main>
        <header>
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb bg-white">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">User</li>
                    <li class="breadcrumb-item text-blue" aria-current="page">Barang Keluar</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->
        </header>
        <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-header">Daftar Produk</div>
                        <div class="card-body">
                            <div class="datatable">
                                <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Sub Kategori</th>
                                            <th>Stok</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $num = 1; ?>
                                        <?php foreach ($msproduk as $produk) : ?>
                                            <tr>
                                                <td> <?= $num++; ?> </td>
                                                <td> <?= $produk->nama_produk; ?> </td>
                                                <td>
                                                    <?php foreach ($subkategori as $row) {
                                                        if ($produk->id_subkategori == $row->id_subkategori) {
                                                            echo $row->deskripsi_subkategori;
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td> <?= $produk->stok_produk; ?> </td>
                                                <td>
                                                    <a href="<?php echo site_url('barangkeluar/addCart/' . $produk->id_produk) ?>" data-toggle="tooltip" title="Tambah Barang Ke Keranjang" class="btn btn-datatable btn-icon btn-transparent-dark mr-2" te><i data-feather="plus"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-header">Keranjang Produk</div>
                        <div class="card-body">
                            <div class="form-group">
                                <a href="<?php echo site_url('barangkeluar/add') ?>" title="Tambah" class="btn btn-primary">Selanjutnya</i></a>
                            </div>
                            <div class="datatable">
                                <table class="table table-hover" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-secondary">
                                            <th>Nama Produk</th>
                                            <th>Qty</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($this->cart->contents() as $items) : ?>
                                            <?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>
                                            <tr>
                                                <td><?php echo $items['name']; ?></td>
                                                <td><?= $items['qty'];  ?></td>
                                                <td>
                                                    <a href="<?php echo site_url('barangkeluar/plus?rowid=' . $items['rowid'] . '&qty=' . $items['qty']); ?>" data-toggle="tooltip" title="Tambah Kuantitas Barang" class="btn btn-datatable btn-icon btn-transparent-dark mr-2" te><i data-feather="plus"></i></a>
                                                    <a href="<?php echo site_url('barangkeluar/minus?rowid=' . $items['rowid'] . '&qty=' . $items['qty']); ?>" data-toggle="tooltip" title="Kurang Kuantitas Barang" class="btn btn-datatable btn-icon btn-transparent-dark mr-2" te><i data-feather="minus"></i></a>
                                                    <a href="<?php echo site_url('barangkeluar/hapus/' . $items['rowid']); ?>" data-toggle="tooltip" title="Hapus Barang Dari Keranjang" class="btn btn-datatable btn-icon btn-transparent-dark mr-2" te><i data-feather="trash-2"></i></a>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>