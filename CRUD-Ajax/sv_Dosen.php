<?php
include "fungsi.php";

switch ($_GET['action'])
{

    case 'save':

		$npp=$_POST["npp"];
		$namadosen=$_POST["namadosen"];
		$homebase=$_POST["homebase"];
				
		$query = mysqli_query($koneksi, "INSERT INTO dosen (npp, namadosen, homebase) VALUES('$npp','$namadosen','$homebase')");
			if ($query)
			{
				echo "Simpan Data Berhasil";
			}
			else
			{
				echo "Simpan Data Gagal :" . mysqli_error($koneksi);
			}
				
			break;
	
	case 'edit':

        $npp=$_POST["npp"];
		$namadosen=$_POST["namadosen"];
		$homebase=$_POST["homebase"];

        $query = mysqli_query($koneksi, "UPDATE dosen SET namadosen='$namadosen', homebase='$homebase' WHERE npp='$npp'");
        if ($query)
        {
            echo "Edit Data Berhasil";
        }
        else
        {
            echo "Edit Data Gagal :" . mysqli_error($koneksi);
        }
    break;

    case 'delete':

        $id = $_POST['id'];
        $query = mysqli_query($koneksi, "DELETE FROM dosen WHERE npp='$id'");
        if ($query)
        {
            echo "Hapus Data Berhasil";
        }
        else
        {
            echo "Hapus Data Gagal :" . mysqli_error($koneksi);
        }
    break;
}
?>
