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