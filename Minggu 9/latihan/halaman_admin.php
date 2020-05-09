<!DOCTYPE html>
<html>
<head>
	<title>Halaman admin</title>
</head>
<body>
	<?php 
	session_start();
 
	if($_SESSION['Hak']==""){
		header("location:index.php?pesan=gagal");
	}
 
	?>
	<h1>Halaman Admin</h1>
 
	<p>Halo <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['Hak']; ?></b>.</p>
 
	<br/>
	<br/>
	
	<a href="http://localhost:801/Minggu%208/crud/">Mengakses Halaman Sekolah CRUD</a> 
	
	<br/>
	<br/>
	
	<a href="logout.php">LOGOUT</a>
</body>
</html>