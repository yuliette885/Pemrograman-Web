<!DOCTYPE html>
<head>
    <title>Latihan</title>
</head>
<body>
<table>
	<table width="400" border="0" cellspacing="0" cellpadding="8" >
	<form action="" method="post">
	<tr>
		<td> NIM </td>
		<td><label></label>
        <Input type="text" name="nim"></td>
	</tr>
	<tr>
		<td> Program Studi </td>
				<td>
					<label for="progdi"></label>
					<select name="progdi">
						<option value="Pilih Data"> Pilih Data </option>
						<option value="Teknik Informatika S1">Teknik Informatika S1</option>
						<option value="Sistem Informasi S1">Sistem Informasi S1</option>
						<option value="Ilmu komunikasi S1">Ilmu komunikasi S1</option>
						<option value="Desain Komunikasi Visual S1">Desain Komunikasi Visual S1</option>
						<option value="Animasi">Animasi</option>
						<option value="Broadcasting D3">Broadcasting D3</option>
						<option value="Teknik Informatika D3">Teknik Informatika D3</option>
					</select>
				</td>
	</tr>
	<tr>
		<td> Nilai Tugas </td>
		<td><label></label>
        <Input type="text" name="nilai_tugas"></td>
	</tr>
	<tr>
		<td> Nilai UTS </td>
		<td><label></label>
        <Input type="text" name="nilai_uts"></td>
	</tr>
	<tr>
		<td> Nilai UAS </td>
		<td><label></label>
        <Input type="text" name="nilai_uas"></td>
	</tr>
	<tr>
	<td>Catatan khusus</td>
	<td><label></label>
            <input type="checkbox" name="catatan[]" value="Kehadiran >= 70%" />Kehadiran >= 70%<br><br>
            <input type="checkbox" name="catatan[]" value="Interaktif di kelas" />Interaktif Di Kelas<br><br>
            <input type="checkbox" name="catatan[]" value="Tidak Terlambat Mengumpulkan Tugas" />Tidak Terlambat Mengumpulkan Tugas</td>
	</tr>
	<tr>
	<td></td>
	<td><button type="submit" name="kirim">Simpan</button></td>
	</table>
    </form>
</body>

</html>

<?php
    if (isset($_POST['kirim'])) {
        $nim = $_POST['nim'];
        $progdi = $_POST['progdi'];
        $nilai_tugas = $_POST['nilai_tugas'];
        $nilai_uts = $_POST['nilai_uts'];
        $nilai_uas = $_POST['nilai_uas'];

        $nilai_akhir = (0.4 * $nilai_tugas) + (0.3 * $nilai_uts) + (0.3 * $nilai_uas);
        if ($nilai_akhir > 84) {
            $status = 'Lulus';
        } elseif ($nilai_akhir > 70) {
            $status = 'Lulus';
        } elseif ($nilai_akhir > 60) {
            $status = 'Lulus';
        } elseif ($nilai_akhir > 50) {
            $status = 'Tidak Lulus';
        } else {
            $status = "Tidak Lulus";
        }

        $selected_catatan = "";
        if (!empty($_POST['catatan'])) {
            foreach ($_POST['catatan'] as $catatan) {
                $selected_catatan .= $catatan . " <br> ";
            }
        }

        echo "
        <table border=3>
            <thead>
                <tr>
                    <th>Program Studi</th>
                    <th>NIM</th>
                    <th>Nilai AKhir</th>
                    <th>Status</th>
                    <th>Catatan Khusus</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>$progdi</td>
                    <td>$nim</td>
                    <td>$nilai_akhir</td>
                    <td>$status</td>
                    <td>$selected_catatan</td>
                </tr>
            </tbody>
        </table>
        ";
    }
    ?>
		