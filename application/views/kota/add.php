<div id="layoutSidenav_content">
    <main>
        <header>
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb bg-white">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">User</li>
                    <li class="breadcrumb-item">Kota</li>
                    <li class="breadcrumb-item text-blue" aria-current="page">Tambah Data</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->
        </header>
        <!-- Main page content-->
        <div class="container mt-4">
            <div class="card mb-4">
                <div class="card-header">
                    Form Kota
                </div>
                <div class="card-body">
                    <form action="<?php echo site_url('kota/add') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label">Kota<span style="color: red">*</span></label>
                            <input type="text" class="form-control <?= form_error('nama_kota') ? 'is-invalid' : '' ?>" name="nama_kota" placeholder="Nama Kota"></input>
                            <?= form_error('nama_kota', '<small class="text-red">', '</small>'); ?>
                        </div>
                        <input class="btn btn-primary" type="submit" name="btn" value="Simpan" />
                        <a class="btn btn-outline-primary" href="<?= base_url('kota'); ?>">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </main>