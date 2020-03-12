<?php
session_start(); //memulai session
//mengambil isian username dan password dari form
$username = ltrim(($_POST['username']));
$password = ltrim(($_POST['password']));

if (($username == "pos") and ($password == "testing")) {
//menyimpan tipe user dan username dalam session
$_SESSION['user'] = 'admin';
header("Location: http://localhost:8080/website/Simple%20POS/index.php");


}
//jika password tidak sesuai
else {
$warning = "Username / Password Salah<br>";
echo($warning);
echo '<a href="login.php">Klik Untuk Login Kembali</a>';
}
?>