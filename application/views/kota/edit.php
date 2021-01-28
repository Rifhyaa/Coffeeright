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
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $kota->id_kota ?>" />
                        <div class="form-group">
                            <label class="control-label">Kota<span style="color: red">*</span></label>
                            <input type="text" class="form-control <?= form_error('nama_kota') ? 'is-invalid' : '' ?>" name="nama_kota" value="<?= $kota->nama_kota; ?>" placeholder="Nama Kota"></input>
                            <?= form_error('nama_kota', '<small class="text-red">', '</small>'); ?>
                        </div>
                        <input class="btn btn-primary" type="submit" name="btn" value="Ubah" />
                        <a class="btn btn-outline-primary" href="<?= base_url('kota'); ?>">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </main>