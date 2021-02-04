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
        <div class="container mt-4">
            <div class="card mb-4">
                <div class="card-header">
                    Detail Pembayaran
                </div>
                <div class="card-body">
                    <form action="<?php echo site_url('trkasir/cobasave') ?>" method="post" enctype="multipart/form-data">
                    <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Keranjang Pembelian</span>
                    </h4>
                    <ul class="list-group mb-3">
                        <?php if($this->cart->total_items() > 0){ foreach($this->cart->contents() as $item){ ?>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0"><?php echo $item["name"]; ?></h6>
                                <small class="text-muted"><?php echo 'Rp'.$item["price"]; ?>(<?php echo $item["qty"]; ?>)</small>
                            </div>
                            <span class="text-muted"><?php echo 'Rp'.$item["subtotal"]; ?></span>
                        </li>
                        <?php } }else{ ?>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <p>Keranjang Kosong...</p>
                        </li>
                        <?php } ?>
                        <li class="list-group-item d-flex justify-content-between">
                            <span><strong>Total</strong></span>
                            <strong><?php echo 'Rp'.$this->cart->total(); ?></strong>
                        </li>
                    </ul>
                    <a href="<?php echo base_url('trkasir/'); ?>" class="btn btn-block btn-info">Tambah Produk</a>
                    
                    <div class="form-group mt-5">
                            <label class="control-label">Total Bayar<span style="color: red">*</span></label>
                            <input type="text" id="bayar" name="total_bayar" onkeyup = "inputan()" class="priceformat form-control <?= form_error('total_bayar') ? 'is-invalid' : '' ?>" name="total_bayar" placeholder="Total Bayar"></input>
                            <?= form_error('total_bayar', '<small class="text-red">', '</small>'); ?>
                    </div>
                    <!-- <div class="form-group mt-5">
                            <label class="control-label">Kembali<span style="color: red">*</span></label>
                            <label class="control-label" id="kembali"></label>
                    </div> -->
                    </div>                    
                        <input class="btn btn-primary" type="submit" name="btn" value="Simpan" />
                        <a class="btn btn-outline-primary" href="<?= base_url('trkasir'); ?>">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script type="text/javascript">
        function inputan() {
            var total;
            var bayar;
            var kembalian;
            total = <?= $this->cart->total(); ?>
            bayar = document.getElementById("bayar").value;
            kembalian = parseInt(bayar) - parseInt(total);
            if (kembalian > 0) {
                document.getElementById("kembali").innerHTML = "Rp " + kembalian;
            }
            else {
                document.getElementById("kembali").innerHTML = "Rp 0";
            }
        }
    </script>