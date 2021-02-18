<div class="container-fluid">
    <div class="container">
        <div class="card">
            <div class="card-body row">
                <div class="col-lg">
                    <?php if ($mskeranjang == null) { ?>
                        <div class="container">
                            <br><br>
                            <div class="container">
                                <div class="card-body">
                                    <div class="col ">
                                        <div class="row justify-content-center align-self-center">
                                            <h4><b>Keranjang anda masih kosong</b></h4>
                                        </div>
                                        <div class="row justify-content-center align-self-center">
                                            <p>Cari produk pilihanmu !</p>
                                        </div>
                                        <div class="row justify-content-center align-self-center">
                                            <a href="<?= site_url('Catalog') ?>">
                                                <button class="btn btn-block" style="background-color: rgba(221, 161, 94, 0.9); color:white">Mulai Belanja</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br><br>
                        </div>

                    <?php } else { ?>
                        <?php foreach ($mskeranjang as $cart) : ?>
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="row">
                                        <?php foreach ($produk as $list) :
                                            if ($cart->id_produk == $list->id_produk) :
                                        ?>
                                                <div class="col-lg-2" style="vertical-align: middle">
                                                    <img src="<?= base_url("assets/img/upload/" . $list->foto) ?>" class="img-fluid img-thumbnail" alt="" />
                                                </div>
                                                <div class="col-lg-4 justify-content-center align-self-center">
                                                    <h6><?php echo $list->nama_produk; ?></h6>
                                                </div>
                                        <?php
                                            endif;
                                        endforeach;
                                        ?>
                                        <div class="col-lg-2 justify-content-center align-self-center">
                                            <a href="<?php echo site_url('Keranjang/minQty/' . $cart->id_keranjang) ?>">
                                                <i class="fas fa-minus-circle" style="color: rgba(221, 161, 94, 0.9);"></i>
                                            </a>
                                            <?= $cart->qty ?>
                                            <a href="<?php echo site_url('Keranjang/plusQty/' . $cart->id_keranjang) ?>">
                                                <i class="fas fa-plus-circle" style="color: rgba(221, 161, 94, 0.9);"></i>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 justify-content-right align-self-center">
                                            Rp. <?= number_format($cart->total_harga) ?>
                                        </div>
                                        <div class="col-lg-1 justify-content-center align-self-center" style="margin-left: 30px;">
                                            <a href="<?php echo site_url('Keranjang/delete/' . $cart->id_keranjang) ?>">
                                                <i class="fas fa-trash fa-2x" style="color: rgba(221, 161, 94, 0.9);"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                        <?php endforeach; ?>
                        <div class="card shadow" style="background-color: rgba(221, 161, 94, 0.9); color:white">
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-8 justify-content-center align-self-center">
                                            <h5><b>Total Belanjaan</b></h5>
                                        </div>
                                        <div class="col-lg-2 justify-content-center align-self-center">
                                            <h5><b>Rp. <?= number_format($total->sumharga) ?></b></h5>
                                        </div>
                                        <div class="col-lg-2">
                                            <a href="<?php echo site_url('TransaksiBeli/checkout') ?>">
                                                <button class="btn btn-user btn-block" style="color: rgba(221, 161, 120, 0.9); background-color:white">
                                                    <b>Beli (<?= $count ?>)</b>
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</div>