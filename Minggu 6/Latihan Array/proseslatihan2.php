<!DOCTYPE html>
<html>
<head>
    <title>Tabel Hasil</title>
</head>
<body>

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
            $status = 'lulus';
        } elseif ($nilai_akhir > 50) {
            $status = 'Tidak Lulus';
        } else {
            $status = "Tidak Lulus";
        }

        $selected_catatan = array();
        if (!empty($_POST['catatan'])) {
            foreach ($_POST['catatan'] as $catatan) {
                array_push($selected_catatan, $catatan);
            }
        }
    ?>
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
                    <td><?= $progdi ?></td>
                    <td><?= $nim ?></td>
                    <td><?= $nilai_akhir ?></td>
                    <td><?= $status ?></td>
                    <td>
                        <?php
                        foreach ($selected_catatan as $catatan_data) {
                            echo $catatan_data . "<br>";
                        }
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>

    <?php
    }
    ?>
</body>

</html>