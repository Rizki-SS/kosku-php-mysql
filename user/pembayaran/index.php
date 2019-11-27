<?php
$dir = $_SERVER["DOCUMENT_ROOT"];
include($dir . "/user/auth.php");
include($dir . "/config/conn.php");
session_start();
$user = $_SESSION["user"];
$id = $_SESSION["user"]["id"];
session_abort();

if (isset($_GET["msg"])) {
  $msg = $_GET["msg"];

  if ($msg == "insert_ok") {
    $msg = "Data Anda Berhasil Ditambah";
  } else {
    $msg = "";
  }
}

?>

<html>

<head>
  <?php include($dir . "/templates/resources.php") ?>
  <title>Kosku - Pembayaran</title>
  <style>
    .card {
      margin-top: 25px;
      margin-bottom: 25px;
    }
  </style>
  <script>
    $(document).ready(function() {
      $("#msgAlert").slideDown();
      $("#msgAlert").delay(3000);
      $("#msgAlert").slideUp();
    });
  </script>
</head>

<body>
  <?php include($dir . "/templates/navbar.php") ?>
  <div class="container">
    <h1 style="font-weight:bold;">Data Pembayaran</h1>
    <br>
    <?php
    if (!empty($msg)) {
      ?>
      <div class="alert alert-success" id="msgAlert" style="display:none;">
        <?= $msg ?>
      </div>
    <?php
    }
    ?>
    <a href="/user/pembayaran/create.php" class="btn btn-success btn-block">Tambah Data</a>
    <br>
    <h4>Pembayaran Bulan Ini</h4>
    <div class="card">
      <?php
      $findPembayaranNow = "SELECT * FROM pembayaran where bulan = MONTH(NOW()) and tahun = YEAR(NOW()) and id_anak_kos = $id";
      $res = mysqli_query($conn, $findPembayaranNow)->fetch_assoc();
      ?>
      <div class="card-header">
        <span>Pembayaran Bulan Ini</span>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-6">
            <?php
            if (!empty($res)) { ?>
              <h4 style="font-weight:bold;">Sudah Membayar</h4>
            <?php } else {
              ?> <h4 style="font-weight:bold;">Belum Membayar</h4> <?php
                                                                    }
                                                                    ?>
          </div>
          <div class="col-6">
            <?php
            if (!empty($res)) { ?>
              <p>Dibayar pada tanggal <?= $res["tgl_transaksi"] ?></p>
            <?php } else {
              ?> <a href="/user/pembayaran/create.php" class="btn btn-success btn-block">Tambah Data</a> 
            <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>
    <h4>Pembayaran Bulan Lainnya</h4>

    <div class="bulan-lain">
      <?php
      $findAllPembayaran = "SELECT * FROM pembayaran where id_anak_kos = $id";
      $res = mysqli_query($conn, $findAllPembayaran);
      while ($data = mysqli_fetch_assoc($res)) { ?>
        <div class="card">
          <div class="card-header">
            <span>Pembayaran Bulan <?= $data["bulan"] ?> tahun <?= $data["tahun"] ?></span>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-6">
              <h4 style="font-weight:bold;">Sudah Membayar</h4>
              </div>
              <div class="col-6">
                <p style="text-align:right;">Dibayar Pada Tanggal <?= $data["tgl_transaksi"] ?></p>
              </div>
            </div>
            <a href="/user/pembayaran/show.php?id=<?= $data["id"]?>" class="btn btn-warning btn-block">Lihat Data</a>
          </div>
        </div>
      <?php }
      ?>
    </div>
  </div>
</body>

</html>