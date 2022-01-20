<!DOCTYPE html>
<html lang="en">

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
            <h1 class="mt-4">User</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
                <li class="breadcrumb-item active">User</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">

                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data User
                </div>

                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Email</th>
                                <th>Level</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Email</th>
                                <th>Level</th>
                            </tr>
                        </tfoot>
                        <?php
                        include('koneksi.php');
                        $no = 1;
                        $query = "SELECT * FROM user";

                        $result = mysqli_query($db, $query);

                        if (!$result) {
                            die("Query Error : " . mysqli_errno($db) . " - " . mysqli_error($db));
                        }

                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $row['nama']; ?></td>
                                <td><?= $row['username']; ?></td>
                                <td>
                                    <?= crypt($row['password'], "hese"); ?>
                                </td>
                                <td><?= $row['email']; ?></td>
                                <td><?php $row['level'];
                                    if (empty($row['level'])) {
                                        echo 'Pasien';
                                    } else {
                                        echo 'Admin';
                                    } ?></td>
                                <td>
                                    <div class="col">

                                        <a role="button" href="edit_user_admin.php?id_user=<?= $row['id_user']; ?>" class="btn btn-sm btn-success">Edit</a>
                                        <a role="button" href="admin_hapus_user.php?id_user=<?= $row['id_user']; ?>" class="btn btn-sm btn-danger <?php $row['level'];
                                                                                                                                                    if (empty($row['level'])) {
                                                                                                                                                    ?> <?php
                                                                                                                                                    } else {
                                                                                                                                                        ?> disabled <?php } ?>" onclick="return confirm('anda yakin ingin hapus?');">Hapus</a>
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