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
                    Form Pengguna
                </div>
                <div class="card-body">
                    <form action="<?php echo site_url('pengguna/add') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label">Nama Pengguna<span style="color: red">*</span></label>
                            <input type="text" class="form-control <?= form_error('nama_pengguna') ? 'is-invalid' : '' ?>" name="nama_pengguna" value="<?= set_value('nama_pengguna'); ?>" placeholder="Nama Pengguna"></input>
                            <?= form_error('nama_pengguna', '<small class="text-red">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Email<span style="color: red">*</span></label>
                            <input type="text" class="form-control <?= form_error('email') ? 'is-invalid' : '' ?>" name="email" value="<?= set_value('email'); ?>" placeholder="Email"></input>
                            <?= form_error('email', '<small class="text-red">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Telepon<span style="color: red">*</span></label>
                            <input type="number" class="form-control <?= form_error('telp') ? 'is-invalid' : '' ?>" name="telp" value="<?= set_value('telp'); ?>" placeholder="Telepon"></input>
                            <?= form_error('telp', '<small class="text-red">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Alamat<span style="color: red">*</span></label>
                            <textarea rows="4" class="form-control  <?= form_error('alamat') ? 'is-invalid' : '' ?>" name="alamat" placeholder="Alamat"><?= set_value('alamat'); ?></textarea>
                            <?= form_error('alamat', '<small class="text-red">', '</small>'); ?>
                        </div>
                        <!-- <div class="form-group">
                            <label class="control-label">Jenis Pengguna<span style="color: red">*</span></label>
                            <select name="id_role" class="form-control <?= form_error('id_role') ? 'is-invalid' : '' ?>">
                                value="<?= set_value('id_role'); ?>"
                                <option value="">- Pilih Jenis Pengguna -</option>
                                <option value="1">Pelanggan</option>
                                <option value="2">Admin</option>
                            </select>
                            <?= form_error('id_role', '<small class="text-red">', '</small>'); ?>
                        </div> -->
                        <div class="form-group">
                            <label class="control-label">Password<span style="color: red">*</span></label>
                            <input type="password" class="form-control <?= form_error('password') ? 'is-invalid' : '' ?>" value="<?= set_value('password'); ?>" name="password" placeholder="Password"></input>
                            <?= form_error('password', '<small class="text-red">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Konfirmasi Password<span style="color: red">*</span></label>
                            <input type="password" class="form-control <?= form_error('conpassword') ? 'is-invalid' : '' ?>" value="<?= set_value('conpassword'); ?>" name="conpassword" placeholder="Konfirmasi Password"></input>
                            <?= form_error('conpassword', '<small class="text-red">', '</small>'); ?>
                        </div>
                        <input class="btn btn-primary" type="submit" name="btn" value="Simpan" />
                        <a class="btn btn-outline-primary" href="<?= base_url('pengguna'); ?>">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </main>