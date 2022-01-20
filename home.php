<?php
session_start();
if (isset($_SESSION['login'])) {
    $login = $_SESSION['login'];
    if ($login == 1) {
        include "koneksi.php";

        // $id_user = $_SESSION['id_user'];
        // if (isset($_GET['id_user'])) {
        //     $id_user  = $_GET['id_user'];
        // } else {
        //     die("Error. No ID Selected!");
        // }
?>

        <html>

        <head>

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
            <title>Login Pendaftaran Online</title>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="row" id="main">
                        <div class="col-sm-12 col-md-12 well" id="content">
                            <h1>
                                <center>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <?php
            $level = $_SESSION['level'];
            if ($level == 0) {
                include "menu_user.php";
            }
            if ($level == 1) {
                include "menu_admin.php";
            }
            ?>
            <hr>

            <hr>
            </body>

        </html>
<?php
    }
} else {
    include "login.php";
}

?>