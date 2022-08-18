<div class="utama">		
		<br><br>
		<h3>TAMBAH DATA DOSEN</h3>
		<br>
		<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  		<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		</div>	
		<form method="POST" id="formAdd">
			<div class="form-group">
				<label for="npp2">NPP:</label>
				<input class="form-control-ku col-md-2" type="text" name="npp1" id="npp1" value="0686.11" readonly>
				<select class="form-control-ku col-md-2" name="npp2" id="npp2">
					<?php
					for($th=1990;$th<=2020;$th++){
						echo "<option value=$th>$th";
					}
					?>					
				</select>
				<input type="text" class="form-control-ku col-md-2" name="npp3" id="npp3">
			</div>
			<div class="form-group">
				<label for="nama">Nama dosen:</label>
				<input class="form-control" type="text" name="nama" id="nama">
			</div>
			<div class="form-group">
				<label for="homebase">Homebase:</label>
				<select class="form-control" name="homebase" id="homebase">
					<?php
					$arrhobe=array('A11','A12','A14','A15','A16','A17','A22','A24','P31');
					foreach($arrhobe as $hb){
						echo "<option value=$hb>$hb";
					}
					?>					
				</select>
			</div>
			<div>
                    <input type="submit" class="btn btn-primary" name="simpan" id="simpan" value="Simpan" />
                    <button type="button" class="btn btn-primary" id="cancelButton">Batal</button>
                </div>
		</form>
	</div>
	<script>
	$(document).ready(function(){
		$("#simpan").on('click', function(){
			var npp1 = $("#npp1").val();
			var npp2 = $("#npp2").val();
			var npp3 = $("#npp3").val();
			var nama = $("#nama").val();
			var homebase = $("#homebase").val();
			$.ajax({
				type	: "post",
				url 	: "sv_addDosen.php",
				data 	: {
					npp1	: npp1,
					npp2 	: npp2,
					npp3	: npp3,
					nama 	: nama,
					homebase: homebase
				},
				success : function(data){
					$("#npp1").val('');
					$('#npp2').val('');
					$("#npp3").val('');
					$('#nama').val('');
					$('#homebase').val('');
					$('#success').show();
					$('#success').html(data);
				}
			});
		});
	});
	</script>	
</body>
</html>
	
