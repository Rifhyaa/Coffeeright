<div id="layoutSidenav_content">
    <main>
        <header>
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb bg-white">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">User</li>
                    <li class="breadcrumb-item">Ulasan</li>
                    <li class="breadcrumb-item text-blue" aria-current="page">Tambah Data</li>
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
                    <form action="<?php echo site_url('ulasan/add') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label">Ulasan<span style="color: red">*</span></label>
                            <textarea rows="4" class="form-control  <?= form_error('deskripsi_ulasan') ? 'is-invalid' : '' ?>" name="deskripsi_ulasan" placeholder="Ulasan"><?= set_value("deskripsi_ulasan"); ?></textarea>
                            <?= form_error('deskripsi_ulasan', '<small class="text-red">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Pengguna<span style="color: red">*</span></label>
                            <select class="form-control <?= form_error('id_pengguna') ? 'is-invalid' : '' ?>" name="id_pengguna" id="id_pengguna">
                                <option value="">-- Pilih Pengguna --</option>
                                <?php foreach ($id_pengguna as $value) : ?>
                                    <option value='<?= $value->id_pengguna ?>' <?= ($value->id_pengguna == set_value("id_pengguna") ? 'selected' : ''); ?>><?= $value->nama_pengguna ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('id_pengguna', '<small class="text-red">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Produk<span style="color: red">*</span></label>
                            <select class="form-control <?= form_error('id_produk') ? 'is-invalid' : '' ?>" name="id_produk" id="id_produk">
                                <option value="">-- Pilih Produk --</option>
                                <?php foreach ($id_produk as $value) : ?>
                                    <option value='<?= $value->id_produk ?>' <?= ($value->id_produk == set_value("id_produk") ? 'selected' : ''); ?>><?= $value->nama_produk ?></option>";
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('id_produk', '<small class="text-red">', '</small>'); ?>
                        </div>

                        <input class="btn btn-primary" type="submit" name="btn" value="Simpan" />
                        <a class="btn btn-outline-primary" href="<?= base_url('ulasan'); ?>">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </main>