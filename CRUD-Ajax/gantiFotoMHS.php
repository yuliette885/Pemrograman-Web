<?php
//panggil file fungsi
require "fungsi.php";

$id=$_POST['id'];
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];


//Set lokasi dan nama file foto
//$folderupload ="foto/";

$folderupload = "foto/".$foto;

//$fileupload = $folderupload . basename($_FILES['foto']['name']);
$jenisfilefoto = strtolower(pathinfo($folderupload,PATHINFO_EXTENSION));
$uploadOk=1;


// Check jika terjadi kesalahan
if ($uploadOk == 0) {
	echo "Maaf, file tidak dapat terupload<br>";
// jika semua berjalan lancar
} else {
	 if (move_uploaded_file($tmp,$folderupload)) {
		//membuat query
		//echo $id." - ".$fileupload;exit;
		$sql="update mhs set foto='$foto' where id='$id'";
		mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
		header("location:updateMhs.php");
	} else {
		echo "Maaf, terjadi kesalahan saat mengupload file foto<br>";
	}
}

?>
