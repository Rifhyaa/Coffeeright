<div id="layoutSidenav_content">
    <main>
        <header>
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb bg-white">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">User</a></li>
                    <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->
        </header>
        <!-- Main page content-->
        <div class="container-fluid mt-4">
            <div class="row">
                <div class="col">
                    <div class="card mb-4">
                        <div class="card-header">Laporan Transaksi Barang Masuk</div>
                        <div class="card-body">
							<div class="row form-group">
								<div class="col-sm-12 col-md-6">
									<a class="btn btn-primary" href="<?= base_url('lapbarangmasukpdf') ?>">Export Laporan</a>
								</div>
							</div>
                            <div class="datatable">
                                <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nomor Transaksi</th>
                                            <th>Nama Pengguna</th>
                                            <th>Tanggal</th>
                                            <th>Produk</th>
                                            <th>Kuantitas</th>
                                            <th>Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $num = 1; 
											$temp_qty = 0;
											$total_qty = 0;
											$total_harga = 0;
											$subtotal_qty = 0;
											$subtotal_harga = 0;
											foreach ($trbarangmasuk as $tr) {
												$temp_counter = 0; ?>
                                            <tr>
                                                <td align="right"> <?= $tr->id_trmasuk; ?> </td>
												<td>
                                                <?php foreach ($pengguna as $row) {
                                                    if ($tr->id_pengguna == $row->id_pengguna) {
                                                        echo $row->nama_pengguna;
                                                    }
                                                }
                                                ?></td>
                                                <td> <?= $tr->creadate; ?> </td>
                                                <?php foreach ($dtbarangmasuk as $dt) {
													if ($dt->id_trmasuk == $tr->id_trmasuk) {
														if ($temp_counter > 0) {
															
															echo "<tr>";
															echo "<td  align='right'>$tr->id_trmasuk</td>";
															echo "<td></td>";
															echo "<td></td>";
														}
														foreach ($produk as $pr) {
															if ($pr->id_produk == $dt->id_produk) {
																echo "<td>$pr->nama_produk</td>";
															}
														} ?>
                                                        <td align="right"> <?= $dt->qty; ?> </td>
														<?php $temp_qty = $dt->qty;
														$subtotal_qty += $temp_qty;
														foreach ($produk as $pr) {
															if ($pr->id_produk == $dt->id_produk) {
																$temp = (($pr->harga_produk) * $temp_qty);
																echo "<td align='right'>Rp".number_format($temp, 1, ',', '.')."</td>";
																$subtotal_harga += ($pr->harga_produk) * $temp_qty;
															}
														}
														if ($temp_counter > 0) {
															echo "</tr>";
														}														
														$temp_counter++;
                                                    }
                                                }
												if ($temp_counter == 1) {
													echo "</tr>";
												}
												echo "<tr>";
												echo "<td  align='right'>$tr->id_trmasuk</td>";
												echo "<td></td>";
												echo "<td></td>";
												echo "<td class='font-weight-bold'>SUB TOTAL</td>";
												echo "<td class='font-weight-bold' align='right'>$subtotal_qty</td>";
												echo "<td class='font-weight-bold' align='right'>Rp".number_format($subtotal_harga, 1, ',', '.')."</td>";
												$total_qty += $subtotal_qty;
												$total_harga += $subtotal_harga;
												$subtotal_qty = 0;
												$subtotal_harga = 0;
										}?>
                                        </tr>
										<!--<tr>
											<td></td>
											<td></td>
											<td></td>
											<td>Total</td>
											<?php echo "<td class='font-weight-bold'>$total_qty</td>";
											echo "<td class='font-weight-bold'>$total_harga</td>"; ?>
										</tr>-->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
