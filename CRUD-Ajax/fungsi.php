<?php
$host = "localhost";
$user = "root";
$pass = "";
$db	  = "pwlgenap2019-akademik01";

$koneksi = mysqli_connect($host,$user,$pass,$db);
if (!$koneksi){
	  die("Koneksi gagal:".mysqli_connect_error());
}
?>
