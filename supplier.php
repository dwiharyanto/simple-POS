<?php
include ("koneksi.php");
// if (!isset($_session['user'])) {
// header("Location: http://localhost:8080/website/Simple%20POS/login.php");
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
	$query = "SELECT  b.nama_barang as nama_barang, `nama_supp`, `min_order`, `lama_produksi` FROM `supplier` s
		INNER join barang b on ( s.id_barang = b.id_barang)";
	$result = mysqli_query($con, $query);
	?>
	<br>
	<section id="tabel_utama" align="right">
		<table>
 			<tr>
				<th>No.</th>
				<th>Nama Supplier</th>
				<th>Barang yang diproduksi</th>
				<th>Lama Produksi (hari)</th>
				<th>Minimum Order (item)</th>
			</tr>
			<?php 
			$no = 1;
			 while($row = mysqli_fetch_assoc($result)) {
			?>
	    		<tr align="center">
	      		<td><?php  echo $no++; ?></td>                  
	      		<td><?php echo $row['nama_supp']; ?></td>
	      		<td><?php echo $row['nama_barang']; ?></td>  
	      		<td><?php echo $row['lama_produksi']; ?></td> 
	      		<td><?php echo $row['min_order']; ?></td> 
	    		</tr>
	    	<?php
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
