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
	<section id="tabel_utama">
		<form action="/action_page.php">
	  <label for="barang">Barang:</label><br>
	  	<select id="cars" name="cars">
		  <option value="volvo">Volvo</option>
		  <option value="saab">Saab</option>
		  <option value="fiat">Fiat</option>
		  <option value="audi">Audi</option>
		</select><br><br>
	  	  <label for="jumlah">Jumlah:</label><br>
		  <input type="text" id="Jumlah" name="jumlah"><br><br>
		  <input type="submit" value="Submit">
		</form>
	</section>
 </body>
</html>
