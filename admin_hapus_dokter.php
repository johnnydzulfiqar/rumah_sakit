<?php
include 'koneksi.php';
$id_dokter = $_GET['id_dokter'];
$datas = mysqli_query($db, "delete from dokter where id_dokter ='$id_dokter'") or die(mysqli_error($koneksi));
echo "<script>alert('data berhasil dihapus.');window.location='status_dokter.php';</script>";
