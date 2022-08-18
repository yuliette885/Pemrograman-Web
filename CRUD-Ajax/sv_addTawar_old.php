<?php
include "fungsi.php";
$idmatkul=$_POST['idmatkul1'].".".$_POST['idmatkul2'];
$npp=$_POST['npp1'].".".$_POST['npp2'].".".$_POST['npp3'];
$hari=$_POST['hari'];
$jamkul=$_POST['jamkul'];
$ruang=$_POST['ruang'];
$sql="insert kultawar values('','$idmatkul','$npp','$hari','$jamkul','$ruang')";
mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
header("location:addTawar.php");
?>