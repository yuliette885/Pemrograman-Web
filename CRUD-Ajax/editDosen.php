<!DOCTYPE html>
<html>
<head>
	<title>Edit Data Dosen</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styleku.css">
	<script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
	<script src="bootstrap4/js/bootstrap.js"></script>	
</head>
<body>
	<?php
	require "fungsi.php";
	require "head.html";
	$npp=$_GET['kode'];
	$sql="select * from dosen where npp='$npp'";
	$qry=mysqli_query($koneksi,$sql);
	$row=mysqli_fetch_assoc($qry);
	?>
	<div class="utama">
        <h2 class="mb-3 text-center">Edit Data Dosen</h2>	
		<form method="post" action="sv_editDosen.php">
		<!-- <div class="row">
		<div class="col-sm-3 text-center">
		</div>
		<div class="col-sm-9">
			<form enctype="multipart/form-data" method="post" action="saveEditDosen.php"> -->
				<div class="form-group">
					<label for="npp">NPP:</label>
					<input class="form-control-ku col-md-3" type="text" name="npp" id="npp" value="<?php echo $row['npp']?>" disabled>					
				</div>
				<div class="form-group">
					<label for="nama">Nama dosen:</label>
					<input class="form-control" type="text" name="namadosen" id="namadosen" value="<?php echo $row['namadosen']?>">
				</div>
				<div class="form-group">
					<label for="homebase">Homebase:</label>
					<select class="form-control" name="homebase" id="homebase">
						<?php
						$arrhobe=array('A11','A12','A14','A15','A16','A17','A22','A24','P31');
						foreach($arrhobe as $hb){
							if ($hb==$row['homebase']){
								echo "<option value=$hb selected>$hb";
							}else{
								echo "<option value=$hb>$hb";
							}	
						}
						?>					
					</select>
				</div>				
				<div>		
					<button class="btn btn-primary" type="submit">Simpan</button>
				</div>
				<input type="hidden" name="npp" value="<?php echo $npp?>">
			</form>
		</div>
	<div>
</body>
</html>