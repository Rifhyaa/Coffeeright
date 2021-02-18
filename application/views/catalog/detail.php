<div class="container-fluid">
    <div class="container">
        <div class="card shadow">
            <div class="card-body">
                <div class="row-lg">
                    <form action="<?= site_url('Keranjang/add') ?>" method="post">
                        <div class="row">
                            <div class="col-lg-5">
                                <img src="<?= base_url("assets/img/upload/" . $produk->foto) ?>" class="img-fluid img-thumbnail" alt="" />
                            </div>
                            <div class="col-lg-6">
                                <div class="container">
                                    <div class="card-body">
                                        <div class="row-md-4">
                                            <h4><b><?= $produk->nama_produk ?></b></h4>
                                        </div>
                                        <div class="row-md-4">
                                            <h6> Terjual <b><?= $penjualan ?></b> - Ulasan <b></b> (<?= $totalUlasan ?>) </h6>
                                        </div>
                                        <br>
                                        <div class="row-md-5">
                                            <h3><b>Rp. <?= number_format($produk->harga_produk) ?></b></h3>
                                        </div>
                                        <hr>
                                        <div class="row-lg-7">
                                            <h5><b>Pengiriman</b></h5>
                                        </div>
                                        <div class="row-lg-7">
                                            <p><i class="fas fa-map-marker-alt"></i> Dikirim dari <b>Jakarta Utara</b></p>
                                        </div>
                                        <div class="row-lg-7">
                                            <p><i class="fas fa-truck"></i> Ongkir mulai dari <b>Rp. 0</b> hingga Rp. 20,000</p>
                                        </div>
                                        <div>
                                            <input name="id_produk" type="hidden" value="<?= $produk->id_produk ?>">
                                            <input name="total_harga" type="hidden" value="<?= $produk->harga_produk ?>">
                                        </div>
                                        <hr>
                                        <div class="row-md-5">
                                            <button type="submit" formaction="<?= site_url('Keranjang/add') ?>" formmethod="post" class="btn btn-prime">Masukan Keranjang</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <br>
                    <div class="row-lg">
                        <div class="card">
                            <div class="card-body">
                                <div class="container">
                                    <div class="col">
                                        <h4><b>Deskripsi Produk</b></h4>
                                        <p><?= $produk->deskripsi_produk ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cta">

                    </div>

                    <div class="row-lg">
                        <div class="card">
                            <div class="card-body">
                                <div class="container">
                                    <h4><b>Ulasan Produk</b></h4>
                                    <br>
                                    <?php foreach ($ulasan as $review) : ?>
                                        <div class="card shadow">
                                            <div class="card-body">
                                                <div class="row">
                                                    <?php foreach ($pengguna as $user) : ?>
                                                        <?php if ($user->id_pengguna == $review->id_pengguna) : ?>
                                                            <div class="col-lg-1">
                                                                <div class="row-lg-1 btn-icon">
                                                                    <img class="img-fluid" src="<?= base_url('assets/img/upload/') . $user->foto; ?>" />
                                                                </div>

                                                            </div>
                                                            <div class="col">
                                                                <div class="row-lg">
                                                                    <h5 style="color: peru;"><b><?= $user->nama_pengguna ?></b></h5>
                                                                </div>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                        <div class="row-lg-8" style="background-color: whitesmoke;">
                                                            <p><?= $review->deskripsi_ulasan ?></p>
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
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {

        var count = $("#count").val();

        for (var k = 1; k < count; k++) {
            var rate = $("#rate_" + k).val();
            console.log(rate);
            for (var i = 1; i <= rate; i++) {
                $("#star" + i + "_" + k).attr({
                    class: 'fas fa-star fa-2x',
                    style: 'color:yellow'
                });
            }
        }

    });
</script>