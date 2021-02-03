<div id="layoutSidenav_content">
    <main>
        <header class="bg-white border-bottom">
            <div class="container-fluid">
                <div class="form-group pt-3">
                    <div class="mt-2 mb-2">
                        <h4 class="text-secondary"><?= $title; ?></h4>
                    </div>
                </div>
            </div>
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
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Deskripsi</th>
                                        <th>Sub Kategori</th>
                                        <th>Harga</th>
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
                                            <td> <?= substr($produk->deskripsi_produk, 0, 125) . "....."; ?> </td>
                                            <td>
                                                <?php foreach ($subkategori as $row) {
                                                    if ($produk->id_subkategori == $row->id_subkategori) {
                                                        echo $row->deskripsi_subkategori;
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td> Rp<?= $produk->harga_produk; ?> </td>
                                            <td> <?= $produk->stok_produk; ?> </td>
                                            <td>
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