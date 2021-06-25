<?php

require "koneksi aplikasi.php";

$grep = mysqli_query($conn, "SELECT * FROM pkl WHERE idl = 1");
$grep = mysqli_fetch_assoc($grep);
?>
<html>
<body>
  <form action="" method="post">
  kode: <input type="text" id ="kode" name="kode"> <br><br>
  merek: <input type="text" id="merek" name="merek"> <br><br>
  <input type="submit" id = "submit" class="input">
  </form>

  <?php

 if ($_POST)
 {
    $kode              = $_POST['kode'];
    $merek             = $_POST['merek'];
    $idl        			 = $grep['idl'];
    $masuk             = mysqli_query($conn, "INSERT INTO pkl (kode, merek, kondisi) VALUES ('$kode','$merek','baik')");
    if ($masuk) {
        header('location: aplikasi.php');
        // echo "berhasil";
    } else {
      echo "gagal";
    }

  }

 ?>

</body>
</html>
