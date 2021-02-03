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
        <div class="container-fluid mt-4 d-flex justify content between">
            <div class="card mb-5">
                <div class="card-header">
                    Data Produk
                </div>
                <div class="card-body">
                    <div class="datatable">
                        <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th style="height:20px;width:180px;">Nama</th>
                                    <th style="height:20px;width:400px;">Deskripsi</th>
                                    <th style="height:20px;width:100px;">Sub Kategori</th>
                                    <th>Stok</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $num = 1; ?>
                                <?php foreach ($msproduk as $produk) : ?>
                                    <tr>
                                        <td> <?= $num++; ?> </td>
                                        <td style="height:20px;width:180px;"> <?= $produk->nama_produk; ?> </td>
                                        <td style="height:20px;width:400px;"> <?= $produk->deskripsi_produk; ?> </td>
                                        <td style="height:20px;width:100px;">
                                            <?php foreach ($subkategori as $row) {
                                                if ($produk->id_subkategori == $row->id_subkategori) {
                                                    echo $row->deskripsi_subkategori;
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td> <?= $produk->stok_produk; ?> </td>
                                        <td>
                                            <a href="<?php echo site_url('barangkeluar/addCart/' . $produk->id_produk) ?>" data-toggle="tooltip" title="Tambah" class="btn btn-datatable btn-icon btn-transparent-dark mr-2" te><i data-feather="plus"></i></a>
                                            <!-- <a href="<?php echo site_url('barangkeluar/minusCart/' . $produk->id_produk) ?>" data-toggle="tooltip" title="Kurang" class="btn btn-datatable btn-icon btn-transparent-dark mr-2" te><i data-feather="minus"></i></a> -->
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- tabel temp -->

                    <div class="card mt-4">
                        <div class="card-header">
                            Detail Barang Keluar
                        </div>
                        <div class="card-body">
                            <div class="datatable">
                                <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="height:20px;width:300px;">Nama Produk</th>
                                            <th>Qty</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($this->cart->contents() as $items) : ?>
                                            <?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>
                                            <tr>
                                                <td>

                                                    <?php echo $items['name']; ?>

                                                    <?php if ($this->cart->has_options($items['rowid']) == TRUE) : ?>

                                                        <p>
                                                            <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value) : ?>

                                                                <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

                                                            <?php endforeach; ?>
                                                        </p>

                                                    <?php endif;
                                                    ?>
                                                </td>
                                                <td><?= $items['qty'];  ?></td>
                                                <td>
                                                    <a href="<?php echo site_url('barangkeluar/hapus/' . $items['rowid']); ?>" data-toggle="tooltip" title="Hapus" class="btn btn-datatable btn-icon btn-transparent-dark mr-2" te><i data-feather="trash-2"></i></a>
                                                    <!-- <a href="<?php echo site_url('barangkeluar/plus/' . $items['rowid']); ?>" data-toggle="tooltip" title="Tambah" class="btn btn-datatable btn-icon btn-transparent-dark mr-2" te><i data-feather="plus"></i></a>
                                        <a href="<?php echo site_url('barangkeluar/minus/' . $items['rowid']); ?>" data-toggle="tooltip" title="Kurang" class="btn btn-datatable btn-icon btn-transparent-dark mr-2" te><i data-feather="minus"></i></a> -->
                                                </td>
                                            </tr>

                                            <?php $i++; ?>

                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <div class='form-group'>
                                    <a href="barangkeluar/cobasave" class="btn btn-primary" type="submit" name="btn">Simpan</a>
                                </div>

                                <div class="container">
                                    <?= var_dump($this->cart->contents()); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>