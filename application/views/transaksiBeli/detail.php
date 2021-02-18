<div class="container-fluid">
    <form method="post" action="add">
        <div class="container">
            <br>
            <div class="card shadow">
                <div class="card-header">
                    <b>Status Pesanan</b>
                </div>
                <div class="card-body">
                    <?php foreach ($transaksiKirim as $send) : ?>
                        <div class="row" style="height: 5rem;">
                            <div class="col-lg-3 text-lg-right">
                                <div class="text-lg-right" style="margin-bottom: -10px;">
                                    <b>
                                        <p class="text-lg-right">
                                            <?php
                                            $time = strtotime($send->creadate);
                                            $date = date("d", $time);
                                            $month = date("F", $time);
                                            $year = date("Y", $time);
                                            $hour = date("H:i", $time);

                                            echo $date . " " . bulanIndo($month) . " " . $year;
                                            ?>
                                        </p>
                                    </b>
                                </div>
                                <div class="text-lg-right">
                                    <p class="text-lg-right"><b><?= $hour  ?></b></p>
                                </div>

                            </div>
                            <div style="width: 5px; background-color: chocolate;">
                                <div class="row justify-content-center align-self-center">
                                    <div class="rounded-circle justify-content-center align-self-center" style="width: 20px; height: 20px; background-color: chocolate;"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 justify-content-center align-self-center">
                                <p>
                                    <?= $send->status ?>
                                    <?php if ($send->keterangan != null) : ?>
                                        ,&nbsp; <?= $send->keterangan ?>
                                    <?php endif; ?>
                                </p>

                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <br>
            <div class="card shadow">
                <div class="card-header">
                    <b>Detail Pengiriman</b>
                </div>
                <div class="card-body">

                    <!-- //billing detail -->

                    <div class="container form-group">
                        <div class="col-lg">
                            <div class="row-lg form-group">
                                <label><b>Nama</b></label>
                                <input type="text" enable="false" value="<?php echo $pengguna->nama_pengguna ?>" class="form-control" readonly />
                            </div>
                            <div class="row-lg form-group">
                                <label><b>Alamat</b></label>
                                <textarea class="form-control" rows="5" readonly><?php echo $pengguna->alamat ?></textarea>
                            </div>
                            <div class="row-lg form-group">
                                <label><b>Kota</b></label>
                                <input type="text" value="<?php echo $pengguna->kota ?>" class="form-control" readonly />
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label><b>Email</b></label>
                                    <input type="text" value="<?php echo $pengguna->email ?>" class="form-control" readonly />
                                </div>
                                <div class="col-lg-6">
                                    <label><b>No Telepon</b></label>
                                    <input type="text" value="<?php echo $pengguna->telp ?>" class="form-control" readonly />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //product detail -->
            <br>
            <div class="card shadow">
                <div class="card-header">
                    <b>Produk Pesanan</b>
                </div>
                <div class="card-body">
                    <div class="container">
                        <?php foreach ($detilTransaksi as $detil) : ?>
                            <?php if ($detil->id_trpembelian == $transaksiBeli->id_trpembelian) : ?>
                                <div class="row">
                                    <?php foreach ($produk as $list) : ?>
                                        <?php if ($list->id_produk == $detil->id_produk) : ?>
                                            <div class="col-lg-2" style="vertical-align: middle">
                                                <img src="<?= base_url("assets/img/upload/" . $list->foto) ?>" class="img-thumbnail">
                                            </div>
                                            <div class="col-lg-4 justify-content-center align-self-center">
                                                <p><b><?php echo $list->nama_produk; ?></b></p>
                                            </div>

                                        <?php break;
                                        endif; ?>
                                    <?php endforeach; ?>
                                    <div class="col-lg-2 justify-content-center align-self-center">
                                        <p><?= $detil->jumlah_produk ?></p>
                                    </div>
                                    <div class="col-lg-2 justify-content-right align-self-center">
                                        <p>Rp. <?= number_format($detil->subtotal_harga) ?></p>
                                    </div>
                                    <div class="col-lg-2 justify-content-right align-self-center">
                                        <a href="<?= site_url('Ulasan/add/' . $list->id_produk) ?>" class="btn btn-prime">Nilai Produk</a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>

                        <!-- //ongkir -->
                        <hr>
                        <div class="row">
                            <div class="col-lg-8">
                                <p>Ongkos Kirim</p>
                            </div>
                            <div class="col-lg text-align-right">
                                <p>Rp. <?php echo $ongkir ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-8">
                                <b>Total Belanjaan</b>
                            </div>
                            <div class="col-lg text-align-right">
                                <b>Rp. <?php echo number_format($total); ?></b>
                                <input name="total_harga" value="<?php echo $total ?>" type="hidden" />
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <a href="<?= site_url('TransaksiBeli') ?>" class="btn btn-prime">Kembali</a>
            </div>
        </div>

    </form>
</div>