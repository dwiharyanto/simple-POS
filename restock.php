<?php
include ("koneksi.php");
session_start();
if (!isset($_SESSION["user"])) {
		header("Location: http://localhost:8080/website/Simple%20POS/login.php");
}
?>
<style>
</style>
<!DOCTYPE html>
<html>
<head>
	<title>Simple POS Application</title>
</head>
<body>
	<h1>Menu</h1>	
	<?php 

		include ('header.php');
		$getBarang = "SELECT `id_barang`, `jml_stock`, `nama_barang` FROM `barang`";
		$hasil = mysqli_query($con, $getBarang);
	
	?>

	<br>
	<section id="tabel_utama">
		<table >
			<tr>
				<th>No.</th>
				<th>Nama Barang</th>
				<th>Keterangan</th>

			</tr>
				<?php
					$no = 1;
					while ($b = mysqli_fetch_assoc($hasil)) {
						echo "<tr align='center'>";
						echo "<td>".$no++."</>";
						echo "<td>".$b['nama_barang']."</td>";
						$id= $b['id_barang'];
						$query1 = "SELECT `id_barang`,`qty`, `tgl_beli` FROM `membeli` WHERE `id_barang` = $id and qty = ANY (SELECT max(`qty`) from membeli WHERE id_barang = $id order by `id_barang` DESC)";
						$result1 = mysqli_query($con, $query1);

						$query2 = "SELECT `id_barang`, `jml_stock` FROM `barang` WHERE `id_barang` = $id order by `id_barang` DESC";

						$result2 = mysqli_query($con, $query2);

						$query3 = "SELECT  `min_order`, `lama_produksi` FROM `supplier` WHERE `id_barang` = $id";

						$result3 = mysqli_query($con, $query3);


				    	 $qty = 0;

						 while($row1 = mysqli_fetch_assoc($result1)) {
						  	$qty =  $row1['qty'];
				    	 }

				    	 while($row2 = mysqli_fetch_assoc($result2)) {
						  	$stock =  $row2['jml_stock']; 
				    	 }

				    	 while($row3 = mysqli_fetch_assoc($result3)) {
						  	$min_order =  $row3['min_order']; 
						  	$lama_produksi =  $row3['lama_produksi']; 
				    	 }

				    if ($qty >0){
					      $estimate0Stock = floor($stock/$qty);

					    	$today = strtotime(date("Y-m-d"));
					    	$selisih = $today-$estimate0Stock;
				    		if ($qty < (0.5 * $min_order) ) {
				    			$selisih2 = $today - $lama_produksi;
				    		}
				    		elseif (($qty >= (0.5 * $min_order)) and ($qty <=1)) {
				    			 $selisih2 = $today - (2*$lama_produksi);
				    		}
				    		else {
				    			$selisih2 = $today - (3*$lama_produksi);
				    		}

				    	if (($selisih2-$selisih)<=1){

				    		echo "<td>barang perlu restock</td>";

				    	}			    	
				    	else if (($selisih2-$selisih)>1){
			    		echo "<td>barang belum butuh restock</td>";
			    		}

			    	}
			    	else {
			    		echo "<td>barang belum butuh restock</td>";
			    	}
					echo "</tr>";
					}
				  ?>
	 	</table>
	</section>
	<section>
		<br>
	</section>
	<section>
		<p> Saat ini: 
		<?php echo date("d-m-Y , H:i", time());?>
		</p>
	</section>
 	</body>
</html>
