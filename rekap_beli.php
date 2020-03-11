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
	$query = "SELECT `tgl_beli`, `qty`, `nama_barang` FROM `membeli`  m INNER JOIN `barang` b on (b.id_barang=m.id_barang) order by `tgl_beli` DESC;";
	$result = mysqli_query($con, $query);
	?>
	<br>
	<section id="tabel_utama" align="right">
		<table>
 			<tr>
			<th>No.</th>
			<th>Nama Barang</th>
			<th>Kuantitas</th>
			<th>tanggal pembelian</th>
			</tr>
			<?php 
			$no = 1;
			 while($row = mysqli_fetch_assoc($result)) {
			?>
	    		<tr align="center">
	      		<td><?php  echo $no++; ?></td>                  
	      		<td><?php echo $row['nama_barang']; ?></td>
	      		<td><?php echo $row['qty']; ?></td>  
	      		<td><?php echo $row['tgl_beli']; ?></td>                  
	    		</tr>
	    	<?php
	    	} 
	    	?>
	 	</table>

	</section>
	<section>
	</section>
	<section>
		<p> Saat ini: 
		<?php echo date("d-m-Y , H:i", time());?>
		</p>
	</section>
 	</body>
</html>
