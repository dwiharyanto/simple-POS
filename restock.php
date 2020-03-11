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
	$query1 = "SELECT `qty`, `tgl_beli` FROM `membeli` WHERE `id_barang` = 2 and qty = ANY (SELECT max(`qty`) from membeli WHERE id_barang = 2)";
	$result1 = mysqli_query($con, $query1);

	$query2 = "SELECT `id_barang`, `jml_stock` FROM `barang` WHERE `id_barang` = 2";

	$result2 = mysqli_query($con, $query2);
	?>
	<br>
	<section id="tabel_utama" align="right">
		<table>
			<?php 
				 while($row1 = mysqli_fetch_assoc($result1)) {
				  	$qty =  $row1['qty']; 
				  	echo $qty;
		    	 } 
		    	 while($row2 = mysqli_fetch_assoc($result2)) {
				  	$stock =  $row2['jml_stock']; 
				  	echo($stock);
		    	 }
		      $estimate0Stock = $stock/$qty;
	    	?>
	    	<p><?php echo($estimate0Stock);?> hari</p>
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
