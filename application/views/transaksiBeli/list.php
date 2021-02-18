<div class="container-fluid">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <?php foreach ($transaksiBeli as $trans) : ?>
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <?php
                                    $time = strtotime($trans->tgl_transaksi);
                                    $date = date("d", $time);
                                    $month = date("F", $time);
                                    $year = date("Y", $time);

                                    echo $date . " " . bulanIndo($month) . " " . $year;
                                    ?>
                                </div>
                            </div>
                            <hr>
                            <?php foreach ($detilTransaksi as $detil) : ?>
                                <?php if ($detil->id_trpembelian == $trans->id_trpembelian) : ?>
                                    <?php foreach ($produk as $list) : ?>
                                        <?php if (($list->id_produk == $detil->id_produk) && ($detil->id_trpembelian == $trans->id_trpembelian)) : ?>
                                            <div class="row">
                                                <div class="col-lg-2" style="vertical-align: middle">
                                                    <img src="<?= base_url("assets/img/upload/" . $list->foto) ?>" class="img-thumbnail">
                                                </div>
                                                <div class="col-lg-5 justify-content-center align-self-center">
                                                    <div class="row">
                                                        <h5 style="color: peru;"><b><?= $list->nama_produk; ?></b></h5>
                                                    </div>
                                                    <div class="row">
                                                        <p>
                                                        <p style="color: orange;">Rp. <?= number_format($list->harga_produk); ?></p> &nbsp; (<?= $detil->jumlah_produk ?> Produk)</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 justify-content-right align-self-center">
                                                    <div class="row">
                                                        <p>Total Harga Produk</p>
                                                    </div>
                                                    <div class="row">
                                                        <h5><b>Rp. <?= number_format($detil->subtotal_harga); ?></b></h5>
                                                    </div>

                                                </div>
                                            </div>
                                            <?php break; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <hr>
                            <div class="row">
                                <div class="col-lg-7">

                                </div>
                                <div class="col-lg-2">
                                    <div class="row">
                                        <p>Total Belanja</p>
                                    </div>
                                    <div class="row">
                                        <h5><b>Rp. <?= number_format($trans->total_harga); ?></b></h5>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <a href="<?= site_url('TransaksiBeli/detail/' . $trans->id_trpembelian) ?>" class="btn btn-prime">Detail Belanjaan</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>