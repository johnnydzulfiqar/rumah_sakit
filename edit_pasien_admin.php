<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>Tables - SB Admin</title>
	<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
	<link href="css/styles.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>


<?php include('menu_admin2.php'); ?>
<style type="text/css">
	#img_div {
		width: 80%;
		padding: 5px;
		margin: 15px auto;
		border: 1px solid #cbcbcb;
	}

	#img_div:after {
		content: "";
		display: block;
		clear: both;
	}

	img {
		float: center;
		margin: 5px;
		width: 100px;
		height: 125px;
	}
</style>

<body>
	<div class="container mt-4">
		<h1>Update Pasien</h1>
		<div class="card">

			<div class=" card-body">
				<?php
				if (isset($_GET['id_pasien'])) {
					$id_pasien  = $_GET['id_pasien'];
				} else {
					die("Error. No ID Selected!");
				}
				include "koneksi.php";
				$query = mysqli_query($db, "SELECT * FROM pasien where $id_pasien=id_pasien");
				$data = mysqli_fetch_assoc($query);
				?>

				<form action="" class="mb-3" method="post" role="form" enctype="multipart/form-data">
					<center>
						<?php
						echo "<div id='img_div'>";
						echo "<img src='img/pasien/pasien" . $data['image'] . "'>";
						?>
					</center>
					<div class="form-group">
						<label>Nama Pasien</label>
						<input type="text" disabled name="nama" required="" class="form-control" value="<?= $data['nama']; ?>">
					</div>
					<div class="form-group">
						<label>Nama Dokter yang dituju</label>
						<input type="text" disabled name="nama_dokter" required="" class="form-control" value="<?= $data['nama_dokter']; ?>">
					</div>
					<div class="form-group">
						<label>Klinik</label>
						<input type="text" disabled name="nama_dokter" required="" class="form-control" value="<?= $data['klinik']; ?>">
					</div>
					<div class="form-group">
						<label>Tagihan Rp : </label>
						<input type="text" name="tagihan" required="" class="form-control" value="<?= $data['tagihan']; ?>">
					</div>
					<div class="form-group">
						<?php
						if (isset($_GET['id_pasien'])) {
							$id_pasien  = $_GET['id_pasien'];
						} else {
							die("Error. No ID Selected!");
						}
						include "koneksi.php";
						$query = mysqli_query($db, "SELECT * FROM pasien");
						$data = mysqli_fetch_assoc($query);
						?>
						<label>Tanggal Pertemuan</label>
						<input type="date" name="tanggal_pertemuan" required="" class="form-control" value="<?= $data['tanggal_pertemuan']; ?>">
					</div>
					<h2>Status</h2>
					<div class="form-check">
						<input name="status" class="form-check-input" type="radio" name="check[0]" value="Diterima" />
						<h4>
							<label class="form-check-label" for="Diterima">
								<div class="p-3" style="color: green;">Diterima</div>
							</label>
						</h4>
					</div>
					<div class="form-check">

						<input name="status" class="form-check-input" type="radio" name="check[0]" value="Ditolak" />
						<h4>
							<label class="form-check-label" for="exampleRadios1">
								<div class="p-3" style="color: red;">DiTolak</div>
							</label>
						</h4>
					</div>

					<button type="submit" class="btn btn-primary" name="submit" value="simpan">Simpan data</button>

				</form>

				<?php

				include('koneksi.php');
				$msg = "";
				if (isset($_POST['submit'])) {
					$tagihan = $_POST['tagihan'];
					$tanggal_pertemuan = $_POST['tanggal_pertemuan'];
					$status = $_POST['status'];
					// extract($_POST);
					// $image = $_FILES['image']['name'];
					// $image_text = mysqli_real_escape_string($db, $_POST['image_text']);
					// $target = "img/".basename($image);
					// mysqli_query($db, $sql);
					// if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
					// $msg = "Image uploaded successfully";
					// 	}else{
					// 		$msg = "Failed to upload image";
					// 			}
					mysqli_query($db, $sql);

					mysqli_query($db, "update pasien set tagihan='$tagihan', tanggal_pertemuan='$tanggal_pertemuan' ,status='$status' where id_pasien = '$id_pasien'") or die(mysqli_error($db));

					echo "<script>alert('data berhasil diupdate.');window.location='home.php';</script>";
				}
				?>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
	<script src="js/scripts.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
	<script src="assets/demo/chart-area-demo.js"></script>
	<script src="assets/demo/chart-bar-demo.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
	<script src="js/datatables-simple-demo.js"></script>
</body>

</html>