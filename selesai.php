<?php
$a = $_GET['id'];

include_once "koneksi aplikasi.php";

$update = mysqli_query($conn, "UPDATE data SET status=0 WHERE idp = $a");

if ($update) header('location: aplikasi.php');

?>
