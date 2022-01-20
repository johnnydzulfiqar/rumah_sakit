<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<body>
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
  <?php
  if (isset($_GET['id_pasien'])) {
    $id_pasien  = $_GET['id_pasien'];
  } else {
    die("Error. No ID Selected!");
  }
  include "koneksi.php";
  $query = mysqli_query($db, "SELECT * FROM pasien where id_pasien=$id_pasien");
  $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
  if (isset($data)) {
    foreach ($data as $pasien) {
  ?>
      <div class="mx-auto" style="width: 500px;">
        <div class="card mb-3" style="max-width: 500px;">
          <div class="row no-gutters">
            <!-- <center>
        <?php
        // echo "<div id='img_div'>";
        //   							  echo "<img src='img/".$siswa['image']."'>";
        ?>
        </center> -->
            <div class="col-md-10">
              <div class="card-body">
                <h5 class="card-title">Nama Pasien : <?= $pasien['nama']; ?></h5>
                <p class="card-text">Nama Dokter : <?= $pasien['nama_dokter']; ?></p>
                <p class="card-text">Klinik : <?= $pasien['klinik']; ?></p>
                <p class="card-text">Ruang : <?= $pasien['ruang']; ?></p>
                <p class="card-text">Tanggal Pertemuan : <?= $pasien['tanggal_pertemuan']; ?>
                <p class="card-text">Status : <?php $a = $pasien['status'];
                                              if ($a == 'Belum Di Konfirmasi') {
                                                echo "<center><h2> <font color=#D4AC2B>$a</font>";
                                              } else if ($a == 'Diterima') {
                                                echo "<center><h2> <font color=green>$a</font>";
                                              } else {
                                                echo "<center><h2> <font color=red>$a</font>";
                                              } ?></p>

              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    <?php } ?>
</body>
<script>
  window.print();
</script>

</html>