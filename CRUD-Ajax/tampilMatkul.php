<DOCTYPE html>
<html>
<?php 
include 'fungsi.php'; 
?>
<body>
	<div class="utama">
	<h2 align="center" class="mt-3">Daftar Mata Kuliah</h2>
	<div class="text-center"><a href="prnMatkulPdf.php"><span class="fas fa-print">&nbsp;Print</span></a></div>
	<button id="addButton" class="btn btn-primary">Tambah Data</button>	
	<span class="float-right">
		<form action="" method="post" class="form-inline">
			<button class="btn btn-primary" type="submit">Cari</button>
			<input class="form-control mr-2 ml-2" type="text" id ="cari" name="cari" placeholder="cari data matkul..." autofocus autocomplete="off">
		</form>
	</span>
	<br><br>
	<!-- Cetak data dengan tampilan tabel -->
	<table class="table table-hover">
	<thead class="thead-light">
	<tr>
		<th>No</th>
		<th>Id Matkul</th>
		<th>Nama Matkul</th>
        <th>SKS</th>
        <th>Jenis</th>
        <th>Semester</th>
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
		 
					  $sql = "SELECT * FROM matkul ORDER BY idmatkul ASC LIMIT $limit_start, $limit";
					  $hasil=mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
					  while($row=mysqli_fetch_assoc($hasil)){
					?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $row["idmatkul"]; ?></td>
				<td><?php echo $row["namamatkul"];   ?></td>
                <td><?php echo $row["sks"];   ?></td>
                <td><?php echo $row["jns"];   ?></td>
                <td><?php echo $row["smt"];   ?></td>
				<td>
                    <a class="btn btn-outline-primary btn-sm" href="editMatkul.php?kode=<?php echo $row['idmatkul']?>">Edit</a>
                    <button id="DeleteButton" class="btn btn-outline-danger btn-sm" value="<?php echo $row['idmatkul']; ?>">Delete</button>
				</td>
        </tr>
      <?php           
      }
      ?>
	</tbody>
	</table>
	
	<?php
				$sql_jumlah = "SELECT count(*) AS jumlah FROM matkul";
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