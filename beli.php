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
	$query = "SELECT `id_barang`, `nama_barang`, `harga`, `jml_stock` FROM `barang`";
	$result = mysqli_query($con, $query);
	?>
	<br>
	<section id="tabel_utama">
		<form action="proses_beli.php" method="GET">
	  <label for="barang">Barang:</label><br>
	  	<select id="barang" name="barang" required>
	  	  <?php 
	  	    while ($data= mysqli_fetch_assoc($result)) {
	  	    	echo "<option value=".$data['id_barang'].">".$data['nama_barang']."</option>";
	  	    }
	  	   ?>
		</select><br><br>
	  	  <label for="jumlah">Jumlah:</label><br>
		  <input type="text" id="Jumlah" name="jumlah" required><br><br>
		  <input type="submit" value="Submit">
		</form>
	</section>
 </body>
</html>
