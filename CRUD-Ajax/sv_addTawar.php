<?php
include "fungsi.php";
$idmatkul=$_POST['idmatkul'];
$npp=$_POST['npp'];
$klp=$_POST['klp'];
$hari=$_POST['hari'];
$jamkul=$_POST['jamkul'];
$ruang=$_POST['ruang'];
$sql="insert kultawar values('','$idmatkul','$npp','$klp','$hari','$jamkul','$ruang')";
mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
//header("location:addTawar.php");
echo "Data telah tersimpan";
?>