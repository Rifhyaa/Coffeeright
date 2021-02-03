<div id="layoutSidenav_content">
    <main>
        <<>
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb bg-white">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">User</li>
                    <li class="breadcrumb-item">Pengguna</li>
                    <li class="breadcrumb-item text-blue" aria-current="page">Ubah Data</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->
            </>
            <!-- Main page content-->
            <div class="container mt-4">
                <div class="card mb-4">
                    <div class="card-header">
                        Form Pengguna
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $pengguna->id_pengguna ?>" />
                            <div class="form-group">
                                <label class="control-label">Nama Pengguna<span style="color: red">*</span></label>
                                <input type="text" class="form-control <?= form_error('nama_pengguna') ? 'is-invalid' : '' ?>" name="nama_pengguna" value="<?= $pengguna->nama_pengguna ?>" placeholder="Nama Pengguna"></input>
                                <?= form_error('nama_pengguna', '<small class="text-red">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Email<span style="color: red">*</span></label>
                                <input type="text" class="form-control <?= form_error('email') ? 'is-invalid' : '' ?>" name="email" value="<?= $pengguna->email ?>" placeholder="Email"></input>
                                <?= form_error('email', '<small class="text-red">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Telepon<span style="color: red">*</span></label>
                                <input type="number" class="form-control <?= form_error('telp') ? 'is-invalid' : '' ?>" name="telp" value="<?= $pengguna->telp ?>" placeholder="Telepon"></input>
                                <?= form_error('telp', '<small class="text-red">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Alamat<span style="color: red">*</span></label>
                                <textarea rows="4" class="form-control  <?= form_error('alamat') ? 'is-invalid' : '' ?>" name="alamat" placeholder="Alamat"><?= $pengguna->alamat ?></textarea>
                                <?= form_error('alamat', '<small class="text-red">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2">Foto Profil</div>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img src="<?= base_url('assets/img/upload/') . $pengguna->foto; ?>" class="img-thumbnail">
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="foto" name="foto">
                                                <label class="custom-file-label" for="foto">Pilih File</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Password<span style="color: red">*</span></label>
                                <input type="password" class="form-control <?= form_error('password') ? 'is-invalid' : '' ?>" name="password" value="<?= $pengguna->password ?>" placeholder="Password"></input>
                                <?= form_error('password', '<small class="text-red">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Konfirmasi Password<span style="color: red">*</span></label>
                                <input type="password" class="form-control <?= form_error('conpassword') ? 'is-invalid' : '' ?>" value="<?= $pengguna->password ?>" name="conpassword" placeholder="Konfirmasi Password"></input>
                                <?= form_error('conpassword', '<small class="text-red">', '</small>'); ?>
                            </div>
                            <input class="btn btn-primary" type="submit" name="btn" value="Ubah" />
                            <a class="btn btn-outline-primary" href="<?= base_url('pengguna'); ?>">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
    </main>