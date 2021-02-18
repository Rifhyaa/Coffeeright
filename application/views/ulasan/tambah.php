<div class="container">
    <div class="card">
        <div class="card shadow">
            <div class="card-body">
                <div class="container">
                    <form action="<?= site_url('Ulasan/tambah') ?>" method="post">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-2" style="vertical-align: middle">
                                        <img src="<?= base_url("assets/img/upload/" . $produk->foto) ?>" class="img-thumbnail">
                                    </div>
                                    <div class="col-lg-4 justify-content-center align-self-center">
                                        <input name="id_produk" type="hidden" value="<?= $produk->id_produk ?>">
                                        <p><b><?php echo $produk->nama_produk; ?></b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="control-label">Ulasan<span style="color: red">*</span></label>
                            <textarea rows="4" class="form-control  <?= form_error('deskripsi_ulasan') ? 'is-invalid' : '' ?>" name="deskripsi_ulasan" required placeholder="Ulasan"><?= set_value("deskripsi_ulasan"); ?></textarea>
                            <?= form_error('deskripsi_ulasan', '<small class="text-red">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-prime" formaction="<?= site_url('Ulasan/tambah') ?>" formmethod="post">Kirim Ulasan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>