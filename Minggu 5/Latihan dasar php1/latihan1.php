<!DOCTYPE html>
<head>
<title>Latihan 1</title>
</head>

<body>
    <?php
    if (isset($_POST['hitung'])) {
        $bil1 = $_POST['bil1'];
        $bil2 = $_POST['bil2'];
        $operator = $_POST['operator'];

        switch ($operator) {
            case 'tambah':
                $hasil = $bil1 + $bil2;
                break;
            case 'kurang':
                $hasil = $bil1 - $bil2;
                break;
            case 'kali':
                $hasil = $bil1 * $bil2;
                break;
            case 'bagi':
                $hasil = $bil1 / $bil2;
                break;
        }
    }
    ?>
    <form action="latihan1.php" method="post">
    bil1 :    <input type="text" name="bil1"><br><br>
    bil2 :   <input type="text" name="bil2"><br><br>
	<?php if (isset($_POST['hitung'])) { ?>
    hasil :    <input type="text" value="<?php echo $hasil; ?>">
    <?php } else { ?>
    hasil :   <input type="text" value="">
    <?php } ?>
	<br><br>
    operator    
		<select multiple name="operator">
            <option value="tambah">+(tambah)</option>
            <option value="kurang">-(kurang)</option>
            <option value="kali">*(kali)</option>
            <option value="bagi">/(bagi)</option>
        </select>
        <input type="submit" name="hitung" value="=">
    </form>   
</body>
</html>