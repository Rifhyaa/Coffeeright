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
                    Form Kategori
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $kategori->id_kategori ?>" />
                        <div class="form-group">
                            <label class="control-label">Kategori<span style="color: red">*</span></label>
                            <input type="text" class="form-control <?= form_error('deskripsi_kategori') ? 'is-invalid' : '' ?>" name="deskripsi_kategori" value="<?= $kategori->deskripsi_kategori; ?>" placeholder="Deskripsi"></input>
                            <?= form_error('deskripsi_kategori', '<small class="text-red">', '</small>'); ?>
                        </div>
                        <input class="btn btn-primary" type="submit" name="btn" value="Ubah" />
                        <a class="btn btn-outline-primary" href="<?= base_url('kategori'); ?>">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </main>