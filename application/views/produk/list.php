<div id="layoutSidenav_content">
    <main>
        <header>
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb bg-white">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">User</li>
                    <li class="breadcrumb-item text-blue" aria-current="page">Produk</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->
        </header>
        <!-- Main page content-->
        <div class="container-fluid mt-4">
            <div class="card mb-4">
                <div class="card-header">
                    Data Produk
                </div>
                <div class="card-body">
                    <div class="row form-group">
                        <div class="col-sm-12 col-md-6">
                            <a class="btn btn-primary" href="<?= site_url('produk/add') ?>">Tambah</a>
                        </div>
                    </div>
                    <div class="table-responsive pt-2">
                        <div class="datatable">
                            <table class="table table-bordered table-hover table-striped nowrap" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="text-center min-wd-50">No</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Deskripsi</th>
                                        <th class="text-center">Sub Kategori</th>
                                        <th class="text-center">Harga</th>
                                        <th class="text-center">Stok</th>
                                        <th class="text-center min-wd-50">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $num = 1; ?>
                                    <?php foreach ($msproduk as $produk) : ?>
                                        <tr>
                                            <td> <?= $num++; ?> </td>
                                            <td> <?= $produk->nama_produk; ?> </td>
                                            <td> <?= substr($produk->deskripsi_produk, 0, 70)."..."; ?> </td>
                                            <td>
                                                <?php foreach ($subkategori as $row) {
                                                    if ($produk->id_subkategori == $row->id_subkategori) {
                                                        echo $row->deskripsi_subkategori;
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right"> Rp<?= number_format($produk->harga_produk); ?> </td>
                                            <td class="text-right"> <?= $produk->stok_produk; ?> </td>
                                            <td class="text-center min-wd-50">
                                                <a href="<?php echo site_url('produk/edit/' . $produk->id_produk) ?>" data-toggle="tooltip" title="Ubah" class="btn btn-datatable btn-icon btn-transparent-dark mr-2" te><i data-feather="edit"></i></a>
                                                <a onclick="deleteConfirm('<?= site_url('produk/delete/' . $produk->id_produk) ?>')" data-toggle="tooltip" title="Hapus" class="btn btn-datatable btn-icon btn-transparent-dark mr-2" te><i data-feather="trash-2"></i></a>
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