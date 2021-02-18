<div id="layoutSidenav_content">
    <main>
        <header>
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb bg-white">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">User</li>
                    <li class="breadcrumb-item">Barang Keluar</li>
                    <li class="breadcrumb-item text-blue" aria-current="page">Konfirmasi</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->
        </header>
        <!-- Main page content-->
        <div class="container mt-4">
            <div class="card mb-4">
                <div class="card-header">
                    Detail Barang Keluar
                </div>
                <div class="card-body">
                    <form action="<?php echo site_url('barangkeluar/saveData') ?>" method="post" enctype="multipart/form-data">
                        <div class="mb-4 col-md-7 small">
                            <table class="table table-hover">
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                </tr>
            
                                <?php if ($this->cart->total_items() > 0) {
                                    foreach ($this->cart->contents() as $item) { ?>
                                    <tr>
                                        <td><?php echo $item["name"]; ?></td>
                                        <td><?php echo $item["qty"]; ?></td>
                                    </tr>
                                    <?php }
                                } else { ?>
                                    <tr>
                                        <td>Keranjang Kosong</td>
                                        <td></td>
                                    </tr> 
                                <?php } ?>
                 
                            </table>
                            <ul class="list-group mb-3">
                                <li class="list-group-item d-flex justify-content-between">
                                    <span><strong>Total</strong></span>
                                    <strong><?php echo $this->cart->total_items(); ?></strong>
                                </li>
                            </ul>
                            <a href="<?php echo base_url('barangkeluar/'); ?>" class="btn btn-info">Tambah Produk</a>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Keterangan<span style="color: red">*</span></label>
                            <textarea rows="4" class="form-control  <?= form_error('keterangan') ? 'is-invalid' : '' ?>" required name="keterangan" placeholder="Keterangan"><?= set_value('keterangan'); ?></textarea>
                            <?= form_error('keterangan', '<small class="text-red">', '</small>'); ?>
                        </div>

                        <input class="btn btn-primary" type="submit" name="btn" value="Simpan" />
                        <a class="btn btn-outline-primary" href="<?= base_url('barangkeluar'); ?>">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </main>