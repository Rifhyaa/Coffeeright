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
                    Form Vendor
                </div>
                <div class="card-body">
                    <form action="<?= site_url('vendor/add') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label">Nama<span style="color: red">*</span></label>
                            <input type="text" class="form-control <?= form_error('nama_vendor') ? 'is-invalid' : '' ?>" name="nama_vendor" value="<?= set_value('nama_vendor'); ?>" placeholder="Nama Vendor"></input>
                            <?= form_error('nama_vendor', '<small class="text-red">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Alamat<span style="color: red">*</span></label>
                            <input type="text" class="form-control <?= form_error('alamat_vendor') ? 'is-invalid' : '' ?>" name="alamat_vendor" value="<?= set_value('alamat_vendor'); ?>" placeholder="Alamat Vendor"></input>
                            <?= form_error('alamat_vendor', '<small class="text-red">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Email<span style="color: red">*</span></label>
                            <input type="text" class="form-control <?= form_error('email_vendor') ? 'is-invalid' : '' ?>" name="email_vendor" value="<?= set_value('email_vendor'); ?>" placeholder="Email Vendor"></input>
                            <?= form_error('email_vendor', '<small class="text-red">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Telepon<span style="color: red">*</span></label>
                            <input type="number" class="form-control <?= form_error('telp_vendor') ? 'is-invalid' : '' ?>" name="telp_vendor" value="<?= set_value('telp_vendor'); ?>" placeholder="Telepon Vendor"></input>
                            <?= form_error('telp_vendor', '<small class="text-red">', '</small>'); ?>
                        </div>
                        <input class="btn btn-primary" type="submit" name="btn" value="Simpan" />
                        <a class="btn btn-outline-primary" href="<?= base_url('vendor'); ?>">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </main>