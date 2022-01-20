<!DOCTYPE html>
<html lang="en">

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
<style>
    #img_div:after {
        content: "";
        display: block;
        clear: both;
    }

    img {
        float: left;
        margin: 5px;
        width: 70px;
        height: 75px;
    }
</style>

<body class="sb-nav-fixed">
    <?php include('menu_admin2.php'); ?>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dokter</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Dokter</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">

                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Dokter <a href="admin_tambah_dokter.php" class="btn btn-sm btn-success">Tambah Dokter</a>
                </div>

                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Klinik</th>
                                <th>Jenis Kelamin</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Klinik</th>
                                <th>Jenis Kelamin</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <?php
                        include('koneksi.php');
                        $no = 1;
                        $query = "SELECT * FROM dokter";

                        $result = mysqli_query($db, $query);

                        if (!$result) {
                            die("Query Error : " . mysqli_errno($db) . " - " . mysqli_error($db));
                        }

                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?= $no; ?></td>


                                <td><?php echo "<div id='img_div'>";
                                    echo "<img src='img/dokter/dokter" . $row['image'] . "'>"; ?></td>
                                <td><?= $row['nama_dokter'];
                                    ?></td>
                                <td><?= $row['klinik']; ?></td>
                                <td><?= $row['jeniskelamin']; ?></td>
                                <td><?= $row['status']; ?></td>
                                <td>
                                    <div class="col">

                                        <a href="edit_dokter_admin.php?id_dokter=<?= $row['id_dokter']; ?>" class="btn btn-sm btn-success">Edit</a>
                                        <a href="admin_hapus_dokter.php?id_dokter=<?= $row['id_dokter']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('anda yakin ingin hapus?');">Hapus</a>
                                </td>

                            <?php $no++;
                        } ?>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; M Naufa Dzulfiqar 2020</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
    </div>
    </div>

</body>

</html>