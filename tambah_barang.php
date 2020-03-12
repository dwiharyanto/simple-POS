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
	?>
	<br>
	
	<section id="tabel_utama">
		<form action="proses_tambah_barang.php" method="GET">
		  <label for="namabrg">Nama Barang:</label>
		  <input type="text" id="namabrg" name="namabrg" required><br>
		  <label for="jmlbrg">Jumlah Barang:</label>
		  <input type="number" id="jmlbrg" name="jmlbrg" min="1" required><br>
		  <label for="hargabrg">Harga Barang:</label>
		  <input type="number" id="hargabrg" name="hargabrg" min="1" required><br>
		  <br>
		  <input type="submit" id ="Submit" name="Submit" value="Submit">
		</form>
	</section>



	<section>
		<p> Saat ini: 
		<?php echo date("d-m-Y , H:i", time());?>
		</p>
	</section>
 	</body>
</html>
