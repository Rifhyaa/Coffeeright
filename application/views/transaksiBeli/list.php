<div class="container-fluid">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <?php foreach ($transaksiBeli as $trans) : ?>
                    <div class="card shadow">
                        <div class="card-body">
                            <?php foreach ($detilTransaksi as $detil) : ?>
                                <?php if ($detil->id_trpembelian == $trans->id_trpembelian) : ?>

                                    <?php foreach ($produk as $list) : ?>
                                        <?php if ($list->id_produk == $detil->id_produk) : ?>
                                            <div class="row">
                                                <div class="col-lg-2" style="vertical-align: middle">
                                                    <img src="<?= base_url("assets/customer/img/product/Are-Coffee-Bag-Valves-Important-oxidation-bmc.jpg") ?>" class="img-thumbnail">
                                                </div>
                                                <div class="col-lg-3 justify-content-center align-self-center">
                                                    <p><b><?php echo $list->nama_produk; ?></b></p>
                                                </div>

                                                <div class="col-lg-3 justify-content-center align-self-center">
                                                    <p><?= $detil->jumlah_produk ?></p>
                                                </div>
                                                <div class="col-lg justify-content-right align-self-center">
                                                    <p>Rp. <?= number_format($detil->subtotal_harga); ?></p>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <div class="row-lg-10">
                                <div class="col-lg-8">
                                    <h5><b>Total Belanjaan</b></h5>
                                </div>
                                <div class="col-lg text-align-right">
                                    <h5><b>Rp. <?= number_format($trans->total_harga); ?></b></h5>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-end">
                                <div class="col-lg-3 d-flex justify-content-end">
                                    <a><button class="btn btn-primary">Nilai Produk</button></a>
                                </div>
                                <div class="col-lg-3">
                                    <a><button class="btn btn-primary">Detail Belanjaan</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>