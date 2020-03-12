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
	<?php 
			
				$id_barang = ltrim($_GET['id']);

				$query = "DELETE FROM `barang` WHERE `id_barang` = $id_barang";

				
				$result = mysqli_query($con, $query);
				

				if (!$result) {
				    die("Connection failed: " . mysqli_connect_error());
				}
				else {
					header("location: http://localhost:8080/website/Simple%20POS/index.php");
				}
			
	?>
	</body>
</html>
