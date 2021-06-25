<?php require "koneksi aplikasi.php"; ?>
<html>
<body>
	<h3>daftar laptop</h3>

  <table border="1">
      <th>no</th><th>idl</th><th>kode</th><th>merek</th><th>kondisi</th><th>keterangan</th><th>aksi</th>
<?php
$query = mysqli_query($conn, "SELECT * FROM pkl");
$no = 1;
while ($data = mysqli_fetch_assoc($query)) {
?>

    <tr><td><?=$no ?></td>
        <td><?=$data['idl'] ?></td>
        <td><?=$data['kode'] ?></td>
        <td><?=$data['merek'] ?></td>
        <td><?=$data['kondisi'] ?></td>
        <td><?=$data['keterangan'] ?></td>
        <td><a href="hapus aplik	asi.php?id=<?=$data['idl'] ?>">hapus</a> | <a href="edit.php?id=<?=$data['idl'] ?>">edit</a> </td></tr>

  <?php $no++; } ?>
  </table>
<br>  <a href="laptop.php?id=<?=$data['idl'] ?>">tambah data laptop</a>
<hr><hr>
<br>
<h3>daftar peminjaman</h3>
<?php
if ($_POST)
{
	$idp               = $_POST['idp'];
	$idl               = $_POST['idl'];
	$nama              = $_POST['nama'];
	$tanggal           =$_POST['tanggal'];
	$status            =$_POST['status'];

	$baca = "INSERT INTO data (idp, idl, nama, tanggal, status) VALUES ('$idp','$idl','$nama','$tanggal','$status')";
	$query = mysqli_query ($conn, $baca);
	if ($query) {
			echo 'data berhasil diinput';
	}
}
?>
<table border="1">
		<th>no</th><th>idp</th><th>kode</th><th>nama</th><th>tanggal</th><th>aksi</th>
<?php
$query = mysqli_query($conn, "SELECT * FROM data WHERE status = 1");
$no = 1;
while ($data = mysqli_fetch_assoc($query)) {
	$idl = $data['idl'];
	$laptop = mysqli_query($conn, "SELECT kode FROM pkl WHERE idl = $idl");
	$laptop = mysqli_fetch_assoc($laptop);
?>

	<tr><td><?=$no ?></td>
			<td><?=$data['idp'] ?></td>
			<td><?=$laptop['kode'] ?></td>
			<td><?=$data['nama'] ?></td>
			<td><?=$data['tanggal'] ?></td>
			<td><a href="selesai.php?id=<?=$data['idp'] ?>">selesai</a>

<?php $no++; } mysqli_close($conn); ?>
</table>
<br>  <a href="pinjam.php?id=<?=$data['idl'] ?>">tambah data peminjaman</a>
</body>
</html>
