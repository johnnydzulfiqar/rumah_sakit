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

<body>
    <?php include "menu_admin2.php"; ?>
    <div class="container col-md-8 mt-4">
        <h1>Tambah Dokter</h1>
        <div class="card">

        </div>
        <div class="card-body">
            <form class="mb-3" action="" method="post" role="form" enctype="multipart/form-data">

                <div class="form-group mb-3">
                    <label>Nama Dokter</label>
                    <input type="text" name="nama_dokter" required="" class="form-control" ?>
                </div>
                <div class="form-group mb-3">
                    <label>Foto</label>
                    <input type="file" name="image" required="" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label>Klinik</label>
                    <input type="text" name="klinik" required="" class="form-control" ?>
                </div>
                <div class="row form-group">

                    <div class="col-md-4 mb-3">
                        <label>Jenis Kelamin : </label>
                        <select class="form-select" name="jeniskelamin" id="jeniskelamin">
                            <option value="-1">Plih Satu</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input style="display: none;" type="text" hidden name="status" value="Aktif" class="form-control">
                    </div>

            </form>

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
                extract($_POST);
                $image = $_FILES['image']['name'];
                $image_text = mysqli_real_escape_string($db, $_POST['image_text']);
                $target = "img/dokter/dokter" . basename($image);
                mysqli_query($db, $sql);
                if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                    $msg = "Image uploaded successfully";
                } else {
                    $msg = "Failed to upload image";
                }



                $datas = mysqli_query($db, "insert into dokter (nama_dokter,klinik,jeniskelamin,status,image,image_text)values('$nama_dokter', '$klinik', '$jeniskelamin', '$status', '$image', '$iamge_text')") or die(mysqli_error($db));



                echo "<script>alert('data berhasil disimpan.');window.location='status_dokter.php';</script>";
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