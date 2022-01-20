<?php
include 'koneksi.php';
$id_user = $_GET['id_user'];
$datas = mysqli_query($db, "delete from user where id_user ='$id_user'") or die(mysqli_error($koneksi));
echo "<script>alert('data berhasil dihapus.');window.location='status_user.php';</script>";
