<!DOCTYPE html>
<html><head>
	<title>Laporan Barang Masuk</title>
</head><body>
	<table><thead>
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
				<td> <?= $tr->id_trmasuk; ?> </td>
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
							echo "<td></td>";
							echo "<td></td>";
							echo "<td></td>";
						}
						foreach ($produk as $pr) {
							if ($pr->id_produk == $dt->id_produk) {
								echo "<td>$pr->nama_produk</td>";
							}
						} ?>
						<td> <?= $dt->qty; ?> </td>
						<?php $temp_qty = $dt->qty;
						$subtotal_qty += $temp_qty;
						foreach ($produk as $pr) {
							if ($pr->id_produk == $dt->id_produk) {
								$temp = (($pr->harga_produk) * $temp_qty);
								echo "<td>$temp</td>";
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
				echo "<td></td>";
				echo "<td></td>";
				echo "<td></td>";
				echo "<td class='font-weight-bold'>SUB TOTAL</td>";
				echo "<td class='font-weight-bold'>$subtotal_qty</td>";
				echo "<td class='font-weight-bold'>$subtotal_harga</td>";
				$total_qty += $subtotal_qty;
				$total_harga += $subtotal_harga;
				$subtotal_qty = 0;
				$subtotal_harga = 0;
			}?>
            </tr>
			<tr>
			<td></td>
			<td></td>
			<td></td>
			<td>Total</td>
			<?php echo "<td class='font-weight-bold'>$total_qty</td>";
			echo "<td class='font-weight-bold'>$total_harga</td>"; ?>
			</tr>
    </tbody></table>
</body></html>
