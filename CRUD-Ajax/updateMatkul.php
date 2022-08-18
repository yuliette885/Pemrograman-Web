<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Akademik::Daftar Mata Kuliah</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styleku.css">
	<script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
	<script src="bootstrap4/js/bootstrap.js"></script>	
	<!-- Use fontawesome 5-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>
    
    <div class="table-responsive" id="tampildatamatkul"></div>   
</body>  
</html> 

<script>
        $(document).ready(function(){  
		load_data();  
		function load_data(page)  
		{  
           $.ajax({  
                url:"tampilMatkul.php",  
                method:"POST",  
                data:{page:page},  
                success:function(data){  
                     $('#tampildatamatkul').html(data);  
                }  
           });  
		}
	  
	  $(document).on('click', '.halaman', function(){
           var page = $(this).attr("id");
           load_data(page);  
      });
	  
	  //Load form add
            $("#tampildatamatkul").on("click", "#addButton", function() {
                $.ajax({
                    url: 'addMatkul.php',
                    type: 'get',
                    success: function(data) {
                        $('#tampildatamatkul').html(data);
                    }
                });
            });
			
			//Load form edit dengan parameter id
            $("#tampildatamatkul").on("click", "#EditButton", function() {
                var id = $(this).attr("value");
                $.ajax({
                    url: 'editMatkul.php',
                    type: 'get',
                    data: {
                        id : id
                    },
                    success: function(data) {
                        $('#tampildatamatkul').html(data);
                    }
                });
            });
			
            //simpan edit data mahasiswa
            $("#tampildatamatkul").on("submit", "#formEdit", function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'sv_Matkul.php?action=edit',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(data) {
                        alert(data);
                        load_data();
                    }
                });
            });

			//hapus data mahasiswa berdasarkan id
            $("#tampildatamatkul").on("click", "#DeleteButton", function() {
                var id = $(this).attr("value");
                $.ajax({
                    url: 'sv_Matkul.php?action=delete',
                    type: 'post',
                    data: {
                        id :id
                    },
                    success: function(data) {
                        alert(data);
                        load_data();
                    }
                });
            });
			
            //button batal
            $("#tampildatamatkul").on("click", "#cancelButton", function() {
                load_data();
            });			
 });  
    </script>		

	<?php
		require "fungsi.php";
		require "head.html";
	?>
