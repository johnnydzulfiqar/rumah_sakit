<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard Rumah Sakit Unikom</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

</head>

<?php include('menu_admin2.php'); ?>
<style type="text/css">
    #img_div {
        width: 15%;
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
    <div class="container col-md-8 mt-4">
        <h1>Update Dokter</h1>


    </div>
    <div class="card-body">
        <?php
        if (isset($_GET['id_dokter'])) {
            $id_dokter  = $_GET['id_dokter'];
        } else {
            die("Error. No ID Selected!");
        }
        include "koneksi.php";
        $query = mysqli_query($db, "SELECT * FROM dokter where $id_dokter=id_dokter");
        $data = mysqli_fetch_assoc($query);
        ?>

        <form action="" method="post" role="form" enctype="multipart/form-data">
            <center>
                <?php
                echo "<div id='img_div'>";
                echo "<img src='img/dokter/dokter" . $data['image'] . "'>";
                ?>
            </center>
            <div class="form-group">
                <label>Nama Dokter</label>
                <input type="text" name="nama_dokter" required="" class="form-control" value="<?= $data['nama_dokter']; ?>">
            </div>
            <div class="form-group">
                <label>Klinik</label>
                <input type="text" name="klinik" required="" class="form-control" value="<?= $data['klinik']; ?>">
            </div>
            <div class="row form-group">

                <div class="col-md-4">
                    <label>Jenis Kelamin : </label>
                    <select class="form-select" name="jeniskelamin" id="jeniskelamin">
                        <option value="-1">Plih Satu</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>
            <h2>Status</h2>
            <div class="form-check">
                <input name="status" class="form-check-input" type="radio" name="check[0]" value="Aktif" />
                <h4>
                    <label class="form-check-label" for="Aktif">
                        <div class="p-3" style="color: green;">Aktif</div>
                    </label>
                </h4>
            </div>
            <div class="form-check">
                <input name="status" class="form-check-input" type="radio" name="check[0]" value="Tidak Aktif" />
                <h4>
                    <label class="form-check-label" for="Tidak Aktif">
                        <div class="p-3" style="color: red;">Tidak Aktif</div>
                    </label>
                </h4>
            </div>
            <button type="submit" class="btn btn-primary" name="submit" value="simpan">Simpan data</button>
        </form>

        <?php

        include('koneksi.php');
        $msg = "";
        if (isset($_POST['submit'])) {
            $nama_dokter = $_POST['nama_dokter'];
            $klinik = $_POST['klinik'];
            $jeniskelamin = $_POST['jeniskelamin'];
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

            mysqli_query($db, "update dokter set nama_dokter='$nama_dokter', klinik='$klinik', jeniskelamin='$jeniskelamin' ,status='$status' where id_dokter = '$id_dokter'") or die(mysqli_error($db));

            echo "<script>alert('data berhasil diupdate.');window.location='status_dokter.php';</script>";
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