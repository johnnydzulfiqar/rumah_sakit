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

<body>
	<?php include "menu_user2.php"; ?>
	<div class="container col-md-8 mt-4">
		<h1>Pendaftaran Pasien</h1>
		<div class="card">

		</div>
		<div class="card-body">
			<form class="mb-3" action="" method="post" role="form" enctype="multipart/form-data">

				<div class="form-group mb-3">
					<label>Nama Pasien</label>
					<input type="text" name="nama" required="" class="form-control" ?>
				</div>
				<div class="form-group mb-3">
					<label>Foto</label>
					<input type="file" name="image" required="" class="form-control">
				</div>
				<div class="row form-group mb-3">
					<div class="col-md-3 text-md-left">
						<label style="color: black;" class="label text-dark">Pilih Dokter</label>
					</div>
					<div class="col-md-4">
						<select class="form-select" name="nama_dokter" id="nama_dokter">
							<option value="-1">Plih Satu</option>
							<?php
							include('koneksi.php');
							$query = mysqli_query($db, "SELECT * FROM dokter");
							$data = mysqli_fetch_all($query, MYSQLI_ASSOC);
							if (isset($data)) {
								foreach ($data as $dokter) {
							?>
									<option value="<?= $dokter['nama_dokter']; ?>"><?= $dokter['nama_dokter']; ?></option>
								<?php } ?>
						</select>
					<?php } ?>
					</div>
				</div>
				<div class="row form-group mb-3">
					<div class="col-md-3 text-md-left">
						<label style="color: black;" class="label text-dark">Pilih Klinik</label>
					</div>
					<div class="col-md-4">
						<select class="form-select" name="klinik" id="klinik">
							<option value="-1">Plih Satu</option>
							<option value="GIGI">GIGI</option>
							<option value="Umum">Umum</option>
							<option value="Anak">Anak</option>
						</select>
					</div>
				</div>

				<div class="row form-group mb-3">
					<div class="col-md-3 text-md-left">
						<label style="color: black;" class="label text-dark">Jenis Kelamin</label>
					</div>
					<div class="col-md-4">
						<select class="form-select" name="jeniskelamin" id="jeniskelamin">
							<option value="-1">Plih Satu</option>
							<option value="Laki-Laki">Laki-Laki</option>
							<option value="Perempuan">Perempuan</option>
							<option value="Other">Other</option>
						</select>
					</div>
				</div>

				<div class="form-group mb-3">
					<label>Tanggal Pertemuan</label>
					<input type="date" name="tanggal_pertemuan" class="form-control">
				</div>
				<div class="form-group">
					<input style="display: none;" type="text" hidden name="status" value="Belum Di Konfirmasi" class="form-control">
				</div>

				<button type="submit" class="btn btn-primary" name="submit" value="simpan">Simpan data</button>
			</form>

			<?php
			include('koneksi.php');
			$msg = "";

			if (isset($_POST['submit'])) {

				$nama = $_POST['nama'];
				$nama_dokter = $_POST['nama_dokter'];
				$klinik = $_POST['klinik'];
				$jeniskelamin = $_POST['jeniskelamin'];
				$tanggal_pertemuan = $_POST['tanggal_pertemuan'];
				$status = $_POST['status'];
				extract($_POST);
				$image = $_FILES['image']['name'];
				$image_text = mysqli_real_escape_string($db, $_POST['image_text']);
				$target = "img/pasien/pasien" . basename($image);
				mysqli_query($db, $sql);

				if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
					$msg = "Image uploaded successfully";
				} else {
					$msg = "Failed to upload image";
				}
				$datas = mysqli_query($db, "insert into pasien (nama,nama_dokter,klinik,tanggal_pertemuan,status,image,image_text)values('$nama', '$nama_dokter', '$klinik', '$tanggal_pertemuan', '$status', '$image', '$iamge_text')") or die(mysqli_error($db));
				echo "<script>alert('data berhasil disimpan.');window.location='home.php';</script>";
			}
			?>
		</div>
	</div>
	</div>


</body>

</html>