<?php
session_start();
if (isset($_SESSION['login'])) {
    $login = $_SESSION['login'];
    if ($login == 1) {
        include "koneksi.php";
?>
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
            <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
                <!-- Navbar Brand-->
                <a class="navbar-brand ps-3" href="index.php">Rumah Sakit Unikom</a>
                <!-- Sidebar Toggle-->
                <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
                <!-- Navbar Search-->
                <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                        <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </form>
                <!-- Navbar-->
                <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                            <li>

                            </li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div id="layoutSidenav">
                <div id="layoutSidenav_nav">
                    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                        <div class="sb-sidenav-menu">
                            <div class="nav">
                                <div class="sb-sidenav-menu-heading">Core</div>
                                <a class="nav-link" href="home.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Dashboard
                                </a>
                                <!-- <div class="sb-sidenav-menu-heading">Interface</div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                    Layouts
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                        <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                    </nav>
                                </div> -->

                                <div class="sb-sidenav-menu-heading">Addons</div>

                                <a class="nav-link" href="status_dokter.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                    Data Dokter
                                </a>
                                <a class="nav-link" href="status_user.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                    Data Users
                                </a>
                            </div>
                        </div>
                        <div class="sb-sidenav-footer">
                            <div class="small">Logged in as:</div>
                            <?php
                            $nama     = $_SESSION['nama'];
                            $username = $_SESSION['username'];

                            echo "$nama($username) ";
                            ?>
                    <?php
                }
            } else {
                include "login.php";
            }

                    ?>
                        </div>
                    </nav>
                </div>
                <div id="layoutSidenav_content">
                    <main>
                        <div class="container-fluid px-4">
                            <h1 class="mt-4">Dashboard</h1>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                            <div class="row">
                                <?php
                                include "koneksi.php";
                                $query = mysqli_query($db, "SELECT * FROM pasien");
                                $jumlah_pasien = mysqli_num_rows($query);
                                ?>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-primary text-white mb-4">
                                        <div class="card-body">Jumlah Pasien = <?= $jumlah_pasien; ?></div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="menu_admin.php">View Details</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <?php
                                    include "koneksi.php";
                                    $query = mysqli_query($db, "SELECT * FROM dokter");
                                    $jumlah_dokter = mysqli_num_rows($query);
                                    ?>
                                    <div class="card bg-primary text-white mb-4">
                                        <div class="card-body">Jumlah Dokter = <?= $jumlah_dokter; ?></div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="status_dokter.php">View Details</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <?php
                                    include "koneksi.php";
                                    $query = mysqli_query($db, "SELECT SUM(tagihan) as total FROM pasien");
                                    $row = mysqli_fetch_array($query);
                                    $sum = $row['total'];
                                    function rupiah($angka)
                                    {

                                        $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
                                        return $hasil_rupiah;
                                    }
                                    ?>

                                    <div class="card bg-success text-white mb-4">
                                        <div class="card-body">Total Income = <br><?= rupiah($sum); ?></div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="#">View Details</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <?php
                                    include "koneksi.php";
                                    $query = mysqli_query($db, "SELECT * FROM user");
                                    $jumlah_user = mysqli_num_rows($query);
                                    ?>
                                    <div class="card bg-primary text-white mb-4">
                                        <div class="card-body">Jumlah Users = <?= $jumlah_user; ?></div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="status_user.php">View Details</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-table me-1"></i>
                                        Data Pasien <a href="form_pasien_admin.php" class="btn btn-sm btn-success">Tambah Pasien</a>
                                    </div>
                                    <div class="card-body">
                                        <table id="datatablesSimple">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Foto</th>
                                                    <th>Nama</th>
                                                    <th>Dokter</th>
                                                    <th>Klinik</th>
                                                    <th>Status</th>
                                                    <th>Tanggal Pertemuan</th>
                                                    <th>Tagihan</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Foto</th>
                                                    <th>Nama</th>
                                                    <th>Dokter</th>
                                                    <th>Klinik</th>
                                                    <th>Ruang</th>
                                                    <th>Status</th>
                                                    <th>Tanggal Pertemuan</th>
                                                    <th>Tagihan</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php
                                                include('koneksi.php');
                                                $no = 1;
                                                $query = "SELECT * FROM pasien";

                                                $result = mysqli_query($db, $query);

                                                if (!$result) {
                                                    die("Query Error : " . mysqli_errno($db) . " - " . mysqli_error($db));
                                                }

                                                while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                    <tr>
                                                        <td><?= $no; ?></td>


                                                        <td><?php echo "<div id='img_div'>";
                                                            echo "<img src='img/pasien/pasien" . $row['image'] . "'>"; ?></td>
                                                        <td><?= $row['nama'];
                                                            ?></td>
                                                        <td><?= $row['nama_dokter']; ?></td>
                                                        <td><?= $row['klinik']; ?></td>
                                                        <td><?php $a = $row['status'];
                                                            if ($a == 'Belum Di Konfirmasi') {
                                                                echo " <font color=#D4AC2B>$a</font>";
                                                            } else if ($a == 'Diterima') {
                                                                echo "<font color=green>$a</font>";
                                                            } else {
                                                                echo "<font color=red>$a</font>";
                                                            } ?></p>
                                                        <td><?= $row['tanggal_pertemuan']; ?></td>
                                                        <td><?= rupiah($row['tagihan']); ?></td>
                                                        <td>
                                                            <div class="col">

                                                                <a href="cetak.php?id_pasien=<?= $row['id_pasien'] ?>" class="btn btn-primary mb-1">Cetak</a>
                                                                <a href="edit_pasien_admin.php?id_pasien=<?= $row['id_pasien'] ?>" class="btn btn-warning mb-1">Update</a>
                                                                <a href="admin_hapus_pasien.php?id_pasien=<?= $row['id_pasien'] ?>" class="btn btn-danger mb-1">Hapus</a>
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
                                <div class="text-muted">Copyright &copy; M Naufa Dzulfiqar 2022</div>
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
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
            <script src="js/scripts.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
            <script src="assets/demo/chart-area-demo.js"></script>
            <script src="assets/demo/chart-bar-demo.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
            <script src="js/datatables-simple-demo.js"></script>
        </body>

        </html>