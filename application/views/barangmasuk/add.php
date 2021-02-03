<div id="layoutSidenav_content">
    <main>
        <header>
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb bg-white">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">User</li>
                    <li class="breadcrumb-item">Barang Masuk</li>
                    <li class="breadcrumb-item text-blue" aria-current="page">Konfirmasi</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->
        </header>
        <!-- Main page content-->
        <div class="container mt-4">
            <div class="card mb-4">
                <div class="card-header">
                    Detail Barang Masuk
                </div>
                <div class="card-body">
                    <form action="<?php echo site_url('barangmasuk/saveData') ?>" method="post" enctype="multipart/form-data">
                        <div class="col-md-4 order-md-2 mb-4">
                            <h4 class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted">Keranjang Barang Masuk</span>
                            </h4>
                            <ul class="list-group mb-3">
                                <?php if ($this->cart->total_items() > 0) {
                                    foreach ($this->cart->contents() as $item) { ?>
                                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                                            <div>
                                                <h6 class="my-0"><?php echo $item["name"]; ?></h6>
                                                <small class="text-muted"><?php echo $item["qty"]; ?></small>
                                            </div>
                                        </li>
                                    <?php }
                                } else { ?>
                                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                                        <p>Keranjang Kosong...</p>
                                    </li>
                                <?php } ?>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span><strong>Total</strong></span>
                                    <strong><?php echo $this->cart->total_items(); ?></strong>
                                </li>
                            </ul>
                            <a href="<?php echo base_url('barangmasuk/'); ?>" class="btn btn-block btn-info">Tambah Produk</a>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Vendor<span style="color: red">*</span></label>
                            <select class="form-control <?= form_error('id_vendor') ? 'is-invalid' : '' ?>" name="id_vendor" id="id_vendor">
                                <option value="">-- Pilih Vendor --</option>
                                <?php foreach ($id_vendor as $value) : ?>
                                    <option value='<?= $value->id_vendor ?>' <?= ($value->id_vendor == set_value("id_vendor") ? 'selected' : ''); ?>><?= $value->nama_vendor ?></option>";
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('id_vendor', '<small class="text-red">', '</small>'); ?>
                        </div>

                        <input class="btn btn-primary" type="submit" name="btn" value="Simpan" />
                        <a class="btn btn-outline-primary" href="<?= base_url('barangmasuk'); ?>">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </main>