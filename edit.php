<?php

require "koneksi aplikasi.php";
$idl = $_GET['id'];


$grep = mysqli_query($conn, "SELECT * FROM pkl WHERE idl = $idl");
$grep = mysqli_fetch_assoc($grep);
?>
<html>
<body>
	<form method="POST" action="">
		kode: <input type="text" name="kode"value="<?=$grep['kode'] ?>"><br>
    merek: <input type="text" name="merek" value="<?=$grep['merek'] ?>"><br>
    kondisi: <input type="text" name="kondisi" value="<?=$grep['kondisi'] ?>"><br>
    keterangan: <br><textarea name="keterangan" rows="8" cols="80"><?=$grep['keterangan'] ?></textarea><br>
		<input type="submit" name="submit" value="Submit">
	</form>

	<?php
	if ($_POST)
	{
    $kode              = $_POST['kode'];
    $merek             = $_POST['merek'];
    $kondisi           =$_POST['kondisi'];
		$keterangan        =$_POST['keterangan'];
    $idl        			 =$grep['idl'];
    $masuk              = mysqli_query($conn, "UPDATE pkl SET kode='$kode', merek='$merek', kondisi='$kondisi', keterangan='$keterangan' WHERE idl=$idl ");
    if ($masuk) {
        header('location: aplikasi.php');
    }
  }
	?>

</body>
</html>
