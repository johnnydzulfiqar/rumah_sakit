<?php
session_start();
include "koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE username='$username' ";
$qry = mysqli_query($db, $sql);
$usr = mysqli_fetch_array($qry);

if (
  md5($username) == md5($usr['username'])
  and
  md5($password) == md5($usr['password'])
) {
  $_SESSION['id_user'] = $usr['id_user'];
  $_SESSION['username'] = $usr['username'];
  $_SESSION['nama']     = $usr['nama'];
  $_SESSION['email']    = $usr['email'];
  $_SESSION['level']    = $usr['level'];
  $_SESSION['login']    = 1;
  $pesan = "Login berhasil, selamat datang $username";
} else {
  $pesan = "Login gagal, username atau password anda salah!";
}

?>
<script>
  alert('<?php echo $pesan; ?>');
  location = 'home.php';
</script>