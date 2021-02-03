<div id="layoutSidenav_content">
    <main>
        <header>
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb bg-white">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">User</li>
                    <li class="breadcrumb-item">Produk</li>
                    <li class="breadcrumb-item text-blue" aria-current="page">Ubah Data</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->
        </header>
        <!-- Main page content-->
        <div class="container mt-4">
            <div class="card mb-4">
                <div class="card-header">
                    Form Produk
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $produk->id_produk ?>" />
                        <div class="form-group">
                            <label class="control-label">Nama<span style="color: red">*</span></label>
                            <input type="text" class="form-control <?= form_error('nama_produk') ? 'is-invalid' : '' ?>" name="nama_produk" placeholder="Nama" value="<?= $produk->nama_produk; ?>"></input>
                            <?= form_error('nama_produk', '<small class="text-red">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Deskripsi<span style="color: red">*</span></label>
                            <textarea cols="3" class="form-control <?= form_error('deskripsi_produk') ? 'is-invalid' : '' ?>" name="deskripsi_produk" placeholder="Deskripsi"><?= $produk->deskripsi_produk; ?></textarea>
                            <?= form_error('deskripsi_produk', '<small class="text-red">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Sub Kategori<span style="color: red">*</span></label>
                            <br />
                            <select class="form-control" name="id_subkategori">
                                <option disabled selected>--Pilih Sub Kategori--</option>
                                <?php foreach ($subkategori as $row) : ?>
                                    <option value="<?= $row->id_subkategori ?>" <?= ($row->id_subkategori ==  $produk->id_subkategori ? 'selected' : '') ?>>
                                        <?= $row->deskripsi_subkategori ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('id_subkategori', '<small class="text-red">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Harga<span style="color: red">*</span></label>
                            <input type="number" class="form-control <?= form_error('harga_produk') ? 'is-invalid' : '' ?>" name="harga_produk" placeholder="Harga" value="<?= $produk->harga_produk; ?>"></input>
                            <?= form_error('harga_produk', '<small class="text-red">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Stok<span style="color: red">*</span></label>
                            <input type="number" class="form-control <?= form_error('stok_produk') ? 'is-invalid' : '' ?>" name="stok_produk" placeholder="Stok" value="<?= $produk->stok_produk; ?>"></input>
                            <?= form_error('stok_produk', '<small class="text-red">', '</small>'); ?>
                        </div>
                        <input class="btn btn-primary" type="submit" name="btn" value="Ubah" />
                        <a class="btn btn-outline-primary" href="<?= base_url('produk'); ?>">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </main>