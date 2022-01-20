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
        <h1>Update User</h1>



    </div>
    <div class="card-body">
        <?php
        if (isset($_GET['id_user'])) {
            $id_user  = $_GET['id_user'];
        } else {
            die("Error. No ID Selected!");
        }
        include "koneksi.php";
        $query = mysqli_query($db, "SELECT * FROM user where $id_user=id_user");
        $data = mysqli_fetch_assoc($query);
        ?>

        <form action="" method="post" role="form" enctype="multipart/form-data">

            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" required="" class="form-control" value="<?= $data['username']; ?>">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required="" class="form-control" value="<?= $data['password']; ?>">
            </div>
            <div class="row form-group">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" required="" class="form-control" value="<?= $data['nama']; ?>">
                </div>
                <div class="form-group mb-3">
                    <label>Email</label>
                    <input type="email" name="email" required="" class="form-control" value="<?= $data['email']; ?>">
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="submit" value="simpan">Simpan data</button>
        </form>

        <?php

        include('koneksi.php');
        $msg = "";
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $nama = $_POST['nama'];
            $email = $_POST['email'];
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
            // mysqli_query($db, $sql);
            mysqli_query($db, "update user set username='$username', password='$password', nama='$nama' ,email='$email' where id_user = '$id_user'") or die(mysqli_error($db));

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