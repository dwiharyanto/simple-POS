<?php
// buat koneksi dengan database mysql
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "latihan_RDBMS";
$con = mysqli_connect($dbhost,$dbuser,$dbpass, $dbname);

//periksa koneksi, tampilkan pesan kesalahan jika gagal
if(!$con){
die ("Koneksi dengan database gagal: ".mysqli_connect_error());
}
// uji coba untuk koneksi berhasil
/*
else {
	echo("koneksi berhasil");
}
*/
?>