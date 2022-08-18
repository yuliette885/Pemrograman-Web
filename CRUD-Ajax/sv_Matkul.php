<?php
include "fungsi.php";

switch ($_GET['action'])
{
    case 'delete':

        $id = $_POST['id'];
        $query = mysqli_query($koneksi, "DELETE FROM matkul WHERE idmatkul='$id'");
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
