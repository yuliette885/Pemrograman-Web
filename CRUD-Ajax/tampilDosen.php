<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Akademik::Daftar Dosen</title>
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
	$sql="select * from dosen where npp like'%$cari%' or
						  namadosen like '%$cari%' or
						  homebase like '%$cari%'";
}else{
	$sql="select * from dosen;";		
}
$hasil=mysqli_query($koneksi,$sql) or die(mysql_error($koneksi));
$kosong=false;
if (!mysqli_num_rows($hasil)){
	$kosong=true;
}
?>
	<div class="utama">
	<h2 align="center" class="mt-3">Daftar Dosen</h2>
	<div class="text-center"><a href="prnDsnPdf.php"><span class="fas fa-print">&nbsp;Print</span></a></div>
	<button id="addButton" class="btn btn-primary">Tambah Data</button>	
	<span class="float-right">
		<form action="" method="post" class="form-inline">
			<button class="btn btn-primary" type="submit">Cari</button>
			<input class="form-control mr-2 ml-2" type="text" id ="cari" name="cari" placeholder="cari data dosen..." autofocus autocomplete="off">
		</form>
	</span>
	<br><br>	
	
	<!-- Cetak data dengan tampilan tabel -->
	<table class="table table-hover">
	<thead class="thead-light">
	<tr>
		<th>No</th>
		<th>NPP</th>
		<th>Nama</th>
		<th>Home Base</th>
		<th>Aksi</th>
	</tr>
	</thead>
</div>
<tbody>
					<?php
					  $page = (isset($_POST['page']))? $_POST['page'] : 1;
					  $limit = 3; 
					  $limit_start = ($page - 1) * $limit;
					  $no = $limit_start + 1;
		 
					  $sql = "SELECT * FROM dosen ORDER BY npp ASC LIMIT $limit_start, $limit";
					  $hasil=mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
					  while($row=mysqli_fetch_assoc($hasil)){
					?>
					<input type="hidden" id="npp" value="<?php echo $row['npp']?>">	
				<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $row["npp"]; ?></td>
				<td><?php echo $row["namadosen"];   ?></td>
				<td><?php echo $row["homebase"];   ?></td>
				<td>
                    <a class="btn btn-outline-primary btn-sm" href="editDosen.php?kode=<?php echo $row["npp"]?>">Edit</a>
                    <button id="DeleteButton" class="btn btn-outline-danger btn-sm" value="<?php echo $row['npp']; ?>">Delete</button>
				</td>
        </tr>
      <?php           
      }
      ?>
	</tbody>
	</table>
	
	<?php
				$sql_jumlah = "SELECT count(*) AS jumlah FROM dosen";
				$hasil=mysqli_query($koneksi,$sql_jumlah);
				while($row1=mysqli_fetch_assoc($hasil)){
				$total_records = $row1['jumlah'];
			?>
	
        <p>Total baris : <?php echo $total_records; ?></p>
		
        <nav class="mb-5">
          <ul class="pagination justify-content-end">
            <?php
              $jumlah_page = ceil($total_records / $limit);
              $jumlah_number = 1; //jumlah halaman ke kanan dan kiri dari halaman yang aktif
              $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1;
              $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page;
        
              if($page == 1){
                echo '<li class="page-item disabled"><a class="page-link" href="#">First</a></li>';
                echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&laquo;</span></a></li>';
              } else {
                $link_prev = ($page > 1)? $page - 1 : 1;
                echo '<li class="page-item halaman" id="1"><a class="page-link" href="#">First</a></li>';
                echo '<li class="page-item halaman" id="'.$link_prev.'"><a class="page-link" href="#"><span aria-hidden="true">&laquo;</span></a></li>';
              }
 
              for($i = $start_number; $i <= $end_number; $i++){
                $link_active = ($page == $i)? ' active' : '';
                echo '<li class="page-item halaman '.$link_active.'" id="'.$i.'"><a class="page-link" href="#">'.$i.'</a></li>';
              }
 
              if($page == $jumlah_page){
                echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
                echo '<li class="page-item disabled"><a class="page-link" href="#">Last</a></li>';
              } else {
                $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
                echo '<li class="page-item halaman" id="'.$link_next.'"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
                echo '<li class="page-item halaman" id="'.$jumlah_page.'"><a class="page-link" href="#">Last</a></li>';
              }
            ?>
          </ul>
		  	<?php } ?>
        </nav>
</body>
</html>