<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Akademik::Daftar Penawaran Mata Kuliah</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styleku.css">
	<script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>	
	<script src="bootstrap4/js/bootstrap.js"></script>
</head>
<body>
<?php

//memanggil file berisi fungsi2 yang sering dipakai
require "fungsi.php";
require "head.html";

/*	cetak data	*/
if (isset($_POST['cari'])){
	$cari=$_POST['cari'];
	$sql="select * from matkul as m, dosen as d, kultawar as k
			where k.idmatkul=m.idmatkul and
				  k.npp = d.npp
				  having
				  namamatkul like'%$cari%' or
				  namadosen like '%$cari%'
				  order by m.namamatkul asc, d.namadosen asc";
}else{
	$sql="select * from matkul as m, dosen as d, kultawar as k
			where k.idmatkul=m.idmatkul and
				  k.npp = d.npp
				  order by m.namamatkul asc, d.namadosen asc";		
}
$hasil=mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
$kosong=false;
if (!mysqli_num_rows($hasil)){
	$kosong=true;
}
?>
<div class="utama">
	<h2 class="text-center">Daftar Penawaran Mata Kuliah</h2>
		<span class="float-left">
			<a class="btn btn-primary" href="addTawar.php">Tambah Data</a>
		</span>
		<span class="float-right">
			<form action="" method="post" class="form-inline">
				<button class="btn btn-primary" type="submit">Cari</button>
				<input class="form-control mr-2 ml-2" type="text" name="cari" placeholder="cari data penawaran..." autofocus autocomplete="off">
			</form>
		</span>
		<br><br><br>	
	<!-- Cetak data dengan tampilan tabel -->
	<table class="table table-hover">
	<thead class="thead-light">
	<tr>
		<th>No.</th>
		<th>Mata Kuliah</th>
		<th>Dosen</th>
		<th>Kelompok</th>
		<th>Hari</th>
		<th>Jam</th>
		<th>Ruang</th>
		<th>Aksi</th>
	</tr>
	</thead>
	<tbody>
	<?php
	//jika data tidak ada
	if ($kosong){
		?>
		<tr><th colspan="6">
			<div class="alert alert-info alert-dismissible fade show text-center">
			<!--<button type="button" class="close" data-dismiss="alert">&times;</button>-->
			Data tidak ada
			</div>
		</th></tr>
		<?php
	}else{	
		$no=1;
		while($row=mysqli_fetch_assoc($hasil)){
			?>	
			<tr>
				<td><?php echo $no?></td>
				<td><?php echo $row["namamatkul"]?></td>
				<td><?php echo $row["namadosen"]?></td>
				<td><?php echo $row["klp"]?></td>
				<td><?php echo $row["hari"]?></td>
				<td><?php echo $row["jamkul"]?></td>
				<td><?php echo $row["ruang"]?></td>
				<td>
				<a class="btn btn-outline-primary btn-sm" href="editKulTawar.php?kode=<?php echo $row['idkultawar']?>">Edit</a>
				<a class="btn btn-outline-danger btn-sm" href="hpsKulTawar.php?kode=<?php echo $row["idkultawar"]?>"onclick="return confirm('Yakin dihapus nih?')">Hapus</a></td>
			</tr>
			<?php 
			$no++;
		}
	}
	?>
	</tbody>
	</table>
</div>
</body>
</html>	
