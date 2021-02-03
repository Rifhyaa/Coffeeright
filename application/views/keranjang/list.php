<div class="container-fluid">
    <div class="container">
        <div class="card">
            <div class="card-body row">
                <div class="col-lg-8">
                    <?php foreach ($mskeranjang as $cart) : ?>
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="row">
                                    <?php foreach ($produk as $list) :
                                        if ($cart->id_produk == $list->id_produk) :
                                    ?>
                                            <div class="col-lg-3" style="vertical-align: middle">
                                                <img src="<?= base_url("assets/customer/img/product/Are-Coffee-Bag-Valves-Important-oxidation-bmc.jpg") ?>" class="img-thumbnail">
                                            </div>
                                            <div class="col-lg-2 justify-content-center align-self-center">
                                                <h6><?php echo $list->nama_produk; ?></h6>
                                            </div>
                                    <?php
                                        endif;
                                    endforeach;
                                    ?>
                                    <div class="col-lg-2 justify-content-center align-self-center">
                                        <a href="<?php echo site_url('Keranjang/plusQty/' . $cart->id_keranjang) ?>">
                                            <i class="fas fa-caret-up fa-lg" style="color: rgba(221, 161, 94, 0.9);"></i>
                                        </a>
                                        <?= $cart->qty ?>
                                        <a href="<?php echo site_url('Keranjang/minQty/' . $cart->id_keranjang) ?>">
                                            <i class="fas fa-caret-down fa-lg" style="color: rgba(221, 161, 94, 0.9);"></i>
                                        </a>
                                    </div>
                                    <div class="col-lg-3 justify-content-right align-self-center">
                                        <?= $cart->total_harga ?>
                                    </div>
                                    <div class="col-lg-2 justify-content-center align-self-center">
                                        <a href="<?php echo site_url('Keranjang/delete/' . $cart->id_keranjang) ?>">
                                            <i class="fas fa-trash fa-2x" style="color: rgba(221, 161, 94, 0.9);"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    <?php endforeach; ?>
                </div>
                <div class="col-lg-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <p>Total</p>
                                </div>
                                <div class="row">
                                    <h5><b><?= $total->sumharga ?></b></h5>
                                </div>
                                <div class="row">
                                    <a href="<?php echo site_url('TransaksiBeli/checkout') ?>">
                                        <button class="btn btn-user btn-block" style="background-color: rgba(221, 161, 94, 0.9); color:white">
                                            Bayar
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>