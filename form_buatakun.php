<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login V16</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="login/images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/css/util.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('https://assets.tvo.org/prod/s3fs-public/article-thumbnails/North-York-hospital.JPG?P43VCbv3QmXlCb2bMs_BtYIVxX5Eg9CO');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Form buat Akun
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" action="" method="post" role="form" enctype="multipart/form-data">

					<div class="wrap-input100 validate-input" data-validate="Isi Username Baru">
						<input class="input100" type="text" name="username" placeholder="Masukan Username Baru">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Isi Email Anda">
						<input class="input100" type="email" name="email" placeholder="Masukan Email Anda">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Isi Nama Anda">
						<input class="input100" type="text" name="nama" placeholder="Masukan Nama Anda">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Isi Password anda">
						<input class="input100" type="password" name="password" placeholder="Masukan Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn" type="submit" name="submit" value="simpan">
							Daftar
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="login/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="login/vendor/bootstrap/js/popper.js"></script>
	<script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="login/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="login/vendor/daterangepicker/moment.min.js"></script>
	<script src="login/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="login/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="login/js/main.js"></script>

</body>
<?php
include('koneksi.php');
$msg = "";
//melakukan pengecekan jika button submit diklik maka akan menjalankan perintah simpan dibawah ini
if (isset($_POST['submit'])) {
	//menampung data dari inputan


	$username = $_POST['username'];
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	extract($_POST);

	$datas = mysqli_query($db, "insert into user (username,password,nama,email,level)values('$username', '$password','$nama', '$email', '$level')") or die(mysqli_error($db));
	echo "<script>alert('data berhasil disimpan.');window.location='login.php';</script>";
}
?>

</html>