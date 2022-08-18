<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Akademik::Edit Data Penawaran</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styleku.css">
	<script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>	
	<script src="bootstrap4/js/bootstrap.js"></script>
	<script>
	/*fungsi untuk membuat isian kode kelompok yang bergantung
	 pada isian nama mata kuliah*/
	 function kode_klp_klik(){
		var kdmatkul = $('#idmatkul').val();
		var kdprodi = kdmatkul.substr(0,3)				
		var kdklp = kdmatkul.substr(5,2);
		var klp = kdprodi + "." + kdklp;		
		$.ajax({
			type	: 'post',
			url 	: 'buatkdklp.php',
			data 	: {klp:klp},
			success : function(dataResult){
				$('#inputklp').html(dataResult);
			} 	
		});
	}
	//karena program edit maka tambah fungsi ini agar data lama muncul di isian
	function kode_klp_load(){		
		var klplama = $('#klplama').val();		
		$.ajax({
			type	: 'post',
			url 	: 'buatkdklp-edit.php',
			data 	: {klplama:klplama},
			success : function(dataResult){
				$('#inputklp').html(dataResult);
			} 	
		});
	}
	</script>
</head>
<body onload="kode_klp_load()">
	<?php
	require "head.html";
	require "fungsi.php";

	$id=$_GET['kode'];
	$sql="select m.idmatkul as midm,d.npp as dnpp, k.klp as kklp, k.hari as khr, k.jamkul as kjkul, k.ruang as kruang from matkul as m, dosen as d, kultawar as k
			where k.idmatkul=m.idmatkul and
				  k.npp = d.npp and
				  k.idkultawar='$id'";
	$qry=mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
	$row=mysqli_fetch_assoc($qry);
	?>
	<div class="utama">
		<h2 class="mb-3 text-center">EDIT PENAWARAN MATA KULIAH</h2>	
		<form action="sv_editKulTawar.php" method="post">
			<div class="form-group">
				<label for="idmatkul">Nama mata kuliah:</label>
				<input type="hidden" name="idkultawar" value="<?php echo $id?>">
				<select class="form-control" name="idmatkul" id="idmatkul">
				<?php
				$sql="select idmatkul, namamatkul from matkul order by namamatkul";
				$qry=mysqli_query($koneksi,$sql);
				while($hsl=mysqli_fetch_row($qry)){
					if ($hsl['0']==$row['midm']){
						echo "<option value=$hsl[0] selected>$hsl[1]";
					}else{
						echo "<option value=$hsl[0]>$hsl[1]";
					}	
				}
				?>
				</select>
			</div>
			<div class="form-group">
				<label for="npp">Nama dosen:</label>
				<select class="form-control" name="npp" id="npp">
				<?php
				$sql="select npp, namadosen from dosen order by namadosen";
				$qry=mysqli_query($koneksi,$sql);
				while($hsl=mysqli_fetch_row($qry)){
					if ($hsl['0']==$row['dnpp']){
						echo "<option value=$hsl[0] selected>$hsl[1]";
					}else{
						echo "<option value=$hsl[0]>$hsl[1]";
					}
				}
				?>
				</select>
			</div>
			<div class="form-group">
				<label for="klp">Kelompok</label>
				<!-- input hidden ini Agar data kelompok lama dapat diambil ke javascript -->
				<input type="hidden" id="klplama" value="<?php echo $row['kklp']?>">
				<script>
					//Jika isian nama mata kuliah berubah
					$(document).ready(function(){
						$('#idmatkul').on('click',function(){
							kode_klp_klik();
						});
					});
				</script>				
				<!-- diisi dengan fungsi kode_klp() -->
				<div id="inputklp"></div>
			</div>
			<div class="form-group">
				<label for="hari">Hari kuliah</label>
				<select class="form-control" name="hari" id="hari">
					<?php
					$hari=array('Senin','Selasa','Rabu','Kamis','Jumat',
					            'Sabtu','Minggu');
					for($i=0;$i<count($hari);$i++){
						if ($hari[$i]==$row['khr']){
							echo "<option value=$hari[$i] selected>$hari[$i]";
						}else{
							echo "<option value=$hari[$i]>$hari[$i]";
						}	
					}
					?>					
				</select>
			</div>
			<div class="form-group">
				<label for="jamkul">Jam kuliah</label>
				<select class="form-control" name="jamkul" id="jamkul">
					<?php
					$jam=array('07.00-08.40','08.40-10.20','10.20-12.00',
					            '12.30-14.10','14.10-16.20','16.20-18.00','18.30-20.10');
					for($i=0;$i<count($jam);$i++){
						if ($jam[$i]==$row['kjkul']){
							echo "<option value=$jam[$i] selected>$jam[$i]";
						}else{
							echo "<option value=$jam[$i]>$jam[$i]";
						}
					}
					?>					
				</select>
			</div>
			<div class="form-group">
				<label for="ruang">Ruang</label>
				<select class="form-control" name="ruang" id="ruang">
					<?php
					$ruang=array('H.4.1','H.4.2','H.4.3','H.4.4','H.4.5','H.5.1','H.5.2','H.5.3','H.5.4','H.5.5');
					for($i=0;$i<count($ruang);$i++){
						if ($ruang[$i]==$row['kruang']){
							echo "<option value=$ruang[$i] selected>$ruang[$i]";
						}else{
							echo "<option value=$ruang[$i]>$ruang[$i]";
						}
					}
					?>					
				</select>
			</div>
			<button class="btn btn-primary" type="submit">Simpan</button>
		</form>	
	</div>
</body>
</html>