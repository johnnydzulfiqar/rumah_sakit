<?php
include 'koneksi.php';
$id_pasien = $_GET['id_pasien'];


$datas = mysqli_query($db, "delete from pasien where id_pasien ='$id_pasien'") or die(mysqli_error($koneksi));


echo "<script>alert('data berhasil dihapus.');window.location='home.php';</script>";
