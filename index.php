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
	$query = "SELECT * FROM `barang` WHERE 1";
	$result = mysqli_query($con, $query);
	?>
	<br>
	<section id="tabel_utama" align="right">
		<table>
 			<tr>
			<th>No.</th>
			<th>Nama Barang</th>
			<th>Harga satuan</th>
			<th>Stock</th>
			<th>aksi</th>
			</tr>
			<?php 
			$no = 1;
			 while($row = mysqli_fetch_assoc($result)) {
			?>
	    		<tr align="center">
	      		<td><?php  echo $no++; ?></td>                  
	      		<td><?php echo $row['nama_barang']; ?></td>
	      		<td><?php echo $row['harga']; ?></td>  
	      		<td><?php echo $row['jml_stock']; ?></td> 
	      		<td>
					<a href="tambah_barang.php">Tambah</a>
					<span>|</span>
	      			<?php echo "<a href='ubah_barang.php?id=$row[id_barang]'>Ubah</a>" ?>
	      			<span>|</span>
	      			<?php echo "<a href='hapus_barang.php?id=$row[id_barang]'>Hapus</a>" ?>
	      		</td>                   
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
