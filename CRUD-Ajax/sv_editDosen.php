<?php
//memanggil file pustaka fungsi
require "fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$npp=$_POST["npp"];
$namadosen=$_POST["namadosen"];
$homebase=$_POST["homebase"];

//membuat query
$sql="update dosen set namadosen='$namadosen',
					   homebase='$homebase'
					 where npp='$npp'";
mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
header("location:updateDosen.php");
?>