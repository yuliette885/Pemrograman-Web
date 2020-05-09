<?php
$db = "crud_pdo";
$host = mysqli_connect("localhost","root","",$db);
 
if($host)
{
	echo "koneksi host berhasil.<br/>";
}
else
{
	echo "koneksi gagal.<br/>";
}
 
if($db)
{
	echo "koneksi database berhasil.";
}
else
{
	echo "koneksi database gagal.";
}
?>