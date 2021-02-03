<div id="layoutSidenav_content">
    <main>
        <header>
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb bg-white">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">User</li>
                    <li class="breadcrumb-item">Ulasan</li>
                    <li class="breadcrumb-item text-blue" aria-current="page">Ubah Data</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->
        </header>
        <!-- Main page content-->
        <div class="container mt-4">
            <div class="card mb-4">
                <div class="card-header">
                    Form Ulasan
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $ulasan->id_ulasan ?>" />

                        <div class="form-group">
                            <label class="control-label">Ulasan<span style="color: red">*</span></label>
                            <textarea rows="4" class="form-control  <?= form_error('deskripsi_ulasan') ? 'is-invalid' : '' ?>" name="deskripsi_ulasan" placeholder="Ulasan"><?= $ulasan->deskripsi_ulasan ?></textarea>
                            <?= form_error('deskripsi_ulasan', '<small class="text-red">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Pengguna<span style="color: red">*</span></label>
                            <select class="form-control" name="id_pengguna" id="id_pengguna">
                                <option value="" disable selected>-- Pilih Pengguna --</option>
                                <?php foreach ($pengguna as $row) : ?>
                                    <option value="<?= $row->id_pengguna ?>" <?= ($row->id_pengguna == $ulasan->id_pengguna ? 'selected' : '') ?>> <?= $row->nama_pengguna ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Produk<span style="color: red">*</span></label>
                            <select class="form-control" name="id_produk" id="id_produk">
                                <option value="" disable selected>-- Pilih Pengguna --</option>
                                <?php foreach ($produk as $row) : ?>
                                    <option value="<?= $row->id_produk ?>" <?= ($row->id_produk == $ulasan->id_produk ? 'selected' : '') ?>> <?= $row->nama_produk ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <input class="btn btn-primary" type="submit" name="btn" value="Ubah" />
                        <a class="btn btn-outline-primary" href="<?= base_url('ulasan'); ?>">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </main>