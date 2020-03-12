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

	$id_barang = $_GET['id'];

	$query = "SELECT * FROM `barang` WHERE `id_barang` = $id_barang";

	$result = mysqli_query($con, $query);
	?>
	<br>
	
	<?php 
		while ($data = mysqli_fetch_assoc($result)) {
	?>
			<section id="tabel_utama">
				<form action="proses_ubah_barang.php" method="GET">
				  <input name="idbrg" type="hidden" value= <?php echo $data['id_barang'] ?>>
				  <label for="namabrg">Nama Barang:</label>
				  <input type="text" id="namabrg" name="namabrg" value= <?php echo $data['nama_barang'] ?> required><br>
				  <label for="jmlbrg">Jumlah Barang:</label>
				  <input type="number" id="jmlbrg" name="jmlbrg" min="1" value= <?php echo $data['jml_stock'] ?>  required><br>
				  <label for="hargabrg">Harga Barang:</label>
				  <input type="number" id="hargabrg" name="hargabrg" min="1" value= <?php echo $data['harga'] ?> required><br>
				  <br>
				  <input type="submit" id ="Update" name="Update" value="Update">
				</form>
			</section>
	<?php
		}
	 ?>



	<section>
		<p> Saat ini: 
		<?php echo date("d-m-Y , H:i", time());?>
		</p>
	</section>
 	</body>
</html>
