<?php
session_start();
include 'koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];
$login = mysqli_query($host,"select * from tb_user where username='$username' and password='$password'");
$cek = mysqli_num_rows($login);
if($cek > 0){
 	$data = mysqli_fetch_assoc($login);
	if($data['Hak']=="admin")
	{
		$_SESSION['username'] = $admin;
		$_SESSION['Hak'] = "admin";
		header("location:halaman_admin.php");
	}
	else 
	if($data['Hak']=="operator1")
	{
		$_SESSION['username'] = $yuli;
		$_SESSION['Hak'] = "operator1";
		header("location:halaman_operator1.php");
	}
	else 
	if($data['Hak']=="operator2")
	{
		$_SESSION['username'] = $dani;
		$_SESSION['Hak'] = "operator2";
		header("location:halaman_operator2.php");
	}
	else
	{
		header("location:index.php?pesan=gagal");
	}	
}
else
{
	header("location:index.php?pesan=gagal");
}
 
?>