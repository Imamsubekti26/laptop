<?php
require "koneksi aplikasi.php";

$idl = $_GET['id'];

$hapus  = mysqli_query($conn, "DELETE FROM pkl WHERE idl = $idl");

if ($hapus) {
    header('location: aplikasi.php');
}
echo "gagal";
 ?>
