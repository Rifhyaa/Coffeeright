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
        <div class="container mt-4">
            <div class="card mb-4">
                <div class="card-header">
                    Form Produk
                </div>
                <div class="card-body">
                    <form action="<?php echo site_url('produk/add') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label">Nama<span style="color: red">*</span></label>
                            <input type="text" class="form-control <?= form_error('nama_produk') ? 'is-invalid' : '' ?>" name="nama_produk" value="<?= set_value('nama_produk'); ?>" placeholder="Nama"></input>
                            <?= form_error('nama_produk', '<small class="text-red">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Deskripsi<span style="color: red">*</span></label>
                            <textarea class="form-control <?= form_error('deskripsi_produk') ? 'is-invalid' : '' ?>" name="deskripsi_produk" placeholder="Deskripsi"><?= set_value('deskripsi_produk'); ?></textarea>
                            <?= form_error('deskripsi_produk', '<small class="text-red">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Sub Kategori<span style="color: red">*</span></label>
                            <br />
                            <select class="form-control" name="id_subkategori">
                                <option disabled selected>--Pilih Sub Kategori--</option>
                                <?php foreach ($subkategori as $row) : ?>
                                    <option value="<?= $row->id_subkategori ?>" <?= ($row->id_subkategori ==  set_value('id_subkategori') ? 'selected' : '') ?>>
                                        <?= $row->deskripsi_subkategori ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('id_subkategori', '<small class="text-red">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Harga<span style="color: red">*</span></label>
                            <input type="number" class="form-control <?= form_error('harga_produk') ? 'is-invalid' : '' ?>" name="harga_produk" value="<?= set_value('harga_produk'); ?>" placeholder="Harga"></input>
                            <?= form_error('harga_produk', '<small class="text-red">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Stok<span style="color: red">*</span></label>
                            <input type="number" class="form-control <?= form_error('stok_produk') ? 'is-invalid' : '' ?>" name="stok_produk" value="<?= set_value('stok_produk'); ?>" placeholder="Stok"></input>
                            <?= form_error('stok_produk', '<small class="text-red">', '</small>'); ?>
                        </div>
                        <input class="btn btn-primary" type="submit" name="btn" value="Simpan" />
                        <a class="btn btn-outline-primary" href="<?= base_url('produk'); ?>">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </main>