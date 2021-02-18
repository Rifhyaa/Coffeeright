<div id="layoutSidenav_content">
    <main>
        <header>
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb bg-white">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">User</li>
                    <li class="breadcrumb-item">Kasir</li>
                    <li class="breadcrumb-item text-blue" aria-current="page">Konfirmasi</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->
        </header>
        <!-- Main page content-->
        <div class="container mt-4">
            <div class="card mb-4">
                <div class="card-header">
                    Detail Pembayaran
                </div>
                <div class="card-body">
                    <form action="<?php echo site_url('trkasir/cobasave') ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-4 col-md-7 small">
                        <table class="table table-hover">
                            <tr>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Subtotal</th>
                            </tr>
        
                            <?php if ($this->cart->total_items() > 0) {
                                foreach ($this->cart->contents() as $item) { ?>
                                <tr>
                                    <td><?php echo $item["name"]; ?></td>
                                    <td><?php echo 'Rp'.number_format($item["price"]); ?></td>
                                    <td><?php echo $item["qty"]; ?></td>
                                    <td><?php echo 'Rp'.number_format($item["subtotal"]); ?></td>
                                </tr>
                                <?php }
                            } else { ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>Keranjang Kosong</td>
                                    <td></td>
                                </tr> 
                            <?php } ?>
                        </table>
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between">
                            <span><strong>Total</strong></span>
                            <strong><?php echo 'Rp'.$this->cart->total(); ?></strong>
                        </li>
                    </ul>
                    <a href="<?php echo base_url('trkasir/'); ?>" class="btn btn-info">Tambah Produk</a>
                    
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