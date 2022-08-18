<?php
include "fungsi.php";
$idkultawar=$_POST['idkultawar'];
$idmatkul=$_POST['idmatkul'];
$npp=$_POST['npp'];
$klp=$_POST['klp'];
$hari=$_POST['hari'];
$jamkul=$_POST['jamkul'];
$ruang=$_POST['ruang'];
$sql="update kultawar set idmatkul = '$idmatkul',
						  npp      = '$npp',
						  klp      = '$klp',
						  hari     = '$hari',
						  jamkul   = '$jamkul',
						  ruang    = '$ruang'
						  where  idkultawar='$idkultawar'";
mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
header("location:updateTawar.php");
?>