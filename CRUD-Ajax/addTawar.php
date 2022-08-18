<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Akademik::Tambah Mata Kuliah Penawaran</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styleku.css">
	<script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
	<script src="bootstrap4/js/bootstrap.js"></script>
	<script>
	function showNmMatkul(){
		var nim1=document.getElementById("idmatkul1").value;
		var nim2=document.getElementById("idmatkul2").value;
		var x=new XMLHttpRequest();
		x.onreadystatechange=function(){
			if(this.readyState==4 && this.status==200){
				document.getElementById('namamatkul').value=this.responseText;
			}
		};
		x.open("GET","cariNmMatkul.php?qnim1=" + nim1 + "&qnim2=" + nim2,true);
		x.send();
	}
	function showNmDosen(){
		var npp1=document.getElementById("npp1").value;
		var npp2=document.getElementById("npp2").value;
		var npp3=document.getElementById("npp3").value;
		var x=new XMLHttpRequest();
		x.onreadystatechange=function(){
			if(this.readyState==4 && this.status==200){
				document.getElementById('namaDosen').value=this.responseText;
			}
		};
		x.open("GET","cariNmDosen.php?qnpp1=" + npp1 + "&qnpp2=" + npp2 + "&qnpp3=" + npp3,true);
		x.send();
	}
	/*fungsi untuk membuat isian kode kelompok yang bergantung
	 pada isian nama mata kuliah*/
	function kode_klp(){
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
	</script>
</head>
<body onload="kode_klp()">
	<?php
	require "head.html";
	require "fungsi.php";
	?>
	<div class="utama">			
		<br><br>
		<h3>Mata Kuliah Ditawarkan</h3>
		<br>
		<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  		<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		</div>
		<form id="faddTawar">			
			<div class="form-group">
				<label for="idmatkul">Nama mata kuliah:</label>
				<select class="form-control" name="idmatkul" id="idmatkul">
				<?php
				$sql="select idmatkul, namamatkul from matkul order by namamatkul";
				$qry=mysqli_query($koneksi,$sql);
				while($hsl=mysqli_fetch_row($qry)){
					echo "<option value=$hsl[0]>$hsl[1]";
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
					echo "<option value='".$hsl[0]."'>".$hsl[1];
				}
				?>
				</select>
			</div>
			<div class="form-group">
				<label for="klp">Kelompok</label>
				<script>
					//Jika isian nama mata kuliah berubah
					$(document).ready(function(){
						$('#idmatkul').on('click',function(){
							kode_klp();
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
						echo "<option value=$hari[$i]>$hari[$i]";
					}
					?>					
				</select>
			</div>
			<div class="form-group">
				<label for="jamkul">Jam kuliah</label>
				<select class="form-control" name="jamkul" id="jamkul">
					<?php
					$jam=array('07.00-08.40','08.40-10.20','10.20-12.00',
					            '12.30-14.10','14.10-16.20',           '16.20-18.00','18.30-20.10');
					for($i=0;$i<count($jam);$i++){
						echo "<option value=$jam[$i]>$jam[$i]";
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
						echo "<option value=$ruang[$i]>$ruang[$i]";
					}
					?>					
				</select>
			</div>
			<div>		
				<button class="btn btn-primary" id="btnSimpan" type="button">Simpan</button>
			</div>
		</form>
	</div>
	<script>
	$(document).ready(function(){
		$("#btnSimpan").on('click', function(){
			var idmatkul = $("#idmatkul").val();						
			var npp = $("#npp").val();
			var klp = $("#klp").val();
			var hari = $("#hari").val();
			var jamkul = $("#jamkul").val();
			var ruang = $("#ruang").val();
			$.ajax({
				type	: "post",
				url 	: "sv_addTawar.php",
				data 	: {
					idmatkul: idmatkul,
					npp 	: npp,
					klp 	: klp,
					hari  	: hari,
					jamkul 	: jamkul,
					ruang 	: ruang
				},
				success : function(data){
					$("#idmatkul").val('');
					$('#npp').val('');
					$("#klp").val('');
					$('#hari').val('');
					$('#jamkul').val('');
					$('#ruang').val('');
					$('#success').show();
					$('#success').html(data);
				}
			});
		});
	});
	</script>	
</body>
</html>