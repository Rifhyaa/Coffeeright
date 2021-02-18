<!DOCTYPE html>
<html><head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head><body>
<div class="container-fluid">
<header>
		<hr />
		<div class="row">
			<div class="col-md-4">
				<img src="<?= base_url('assets/img/coffeeright.png')?>" alt="Logo"  width="10%" />
			</div>
			<div class="col-md-8 text-center">
				<h3 class="font-weight-bold">Coffeeright</h3>
				<p class="mb-1 small">Jl. Gang Raya 8, Sungai Bambu, Jakarta Utara, 14330</p>
				<p class="mb-1 small">Tlp. (021) 651-2021</p>
			</div>
		</div>
		<hr />
    </header>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h3 class="font-weight-bold pb-2">Laporan Barang Masuk</h4>
	</center>
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

</body></html>