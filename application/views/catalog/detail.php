<div class="container-fluid">
    <div class="container">
        <div class="card shadow">
            <div class="card-body">
                <div class="row-lg">
                    <form action="<?= site_url('Keranjang/add') ?>" method="post">
                        <div class="row">
                            <div class="col-lg-5">
                                <img src="<?php echo base_url('assets/customer/img/product/Are-Coffee-Bag-Valves-Important-oxidation-bmc.jpg') ?>" class="img-fluid" alt="" />
                            </div>
                            <div class="col-lg-5">
                                <div class="row-md-4">
                                    <h4><b><?= $produk->nama_produk ?></b></h4>
                                </div>
                                <div class="row-md-4">
                                    <h6> Kategori - subkategori </h6>
                                </div>
                                <div class="row-md-5">
                                    <h4><b>Rp. <?= number_format($produk->harga_produk) ?></b></h4>
                                </div>
                                <div>
                                    <input name="id_produk" type="hidden" value="<?= $produk->id_produk ?>">
                                    <input name="total_harga" type="hidden" value="<?= $produk->harga_produk ?>">
                                </div>
                                <div class="row-md-5">
                                    <button type="submit" formaction="<?= site_url('Keranjang/add') ?>" formmethod="post" class="btn btn-primary">Masukan Keranjang</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row-lg">
                        <div class="card">
                            <div class="card-header">
                                <h4><b>Deskripsi Produk</b></h4>
                            </div>
                            <div class="card-body">
                                <p><?= $produk->deskripsi_produk ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>