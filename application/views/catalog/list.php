<div class="container-fluid">
    <div id="temukan" class="portfoio">
        <div class="container" data-aos="fade-up">
            <div class="row portfolio-container">

                <?php foreach ($msproduk as $produk) : ?>

                    <div class="col-lg-4 portfolio-item">
                        <img src="<?= base_url("assets/img/upload/" . $produk->foto) ?>" class="img-fluid" alt="" />
                        <a href="<?= site_url('Catalog/detail/' . $produk->id_produk) ?>" class="btn portfolio-info align-items-center">
                            <h4><?= $produk->nama_produk ?></h4>
                        </a>
                    </div>

                <?php
                endforeach; ?>
            </div>
        </div>
    </div>