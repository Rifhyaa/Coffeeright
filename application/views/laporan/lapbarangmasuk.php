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
									<a class="btn btn-primary" href="<?= base_url('lapbarangmasuk/print_pdf') ?>">Export Laporan</a>
								</div>
							</div>
							<div class="datatable">
								<table class='table table-bordered'>
									<thead>
										<tr>
											<th class="text-center">
												Tanggal Transaksi
											</th>
											<th class="text-center">
												Karyawan
											</th>
											<th class="text-center">
												Vendor
											</th>
											<th class="text-center">
												Produk
											</th>
											<th class="text-center">Kuantitas</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($dtlaporan as $laporan) : ?>
											<tr>
												<td> <?= $laporan->creadate; ?> </td>
												<td> <?= $laporan->nama_pengguna; ?> </td>
												<td> <?= $laporan->nama_vendor; ?> </td>
												<td> <?= $laporan->nama_produk; ?> </td>
												<td> <?= $laporan->qty; ?> </td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>