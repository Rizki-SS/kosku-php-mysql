<?php
$dir = $_SERVER["DOCUMENT_ROOT"];
include($dir . "/user/auth.php");
include($dir . "/config/conn.php");
session_start();
$user = $_SESSION["user"];
session_abort();

if (isset($_GET["msg"])) {
  $msg = $_GET["msg"];

  if ($msg == "user_update_ok") {
    $msg = "Data Anda Berhasil Diubah";
  } else if ($msg == "delete_ok") {
    $msg = "Data Berhasil Dihapus";
  } else {
    $msg = "";
  }
}

?>

<html>

<head>
  <?php include($dir . "/templates/resources.php") ?>
  <title>Kosku - Home</title>
</head>

<body>
  <?php include($dir . "/templates/navbar.php") ?>
  <div class="container">
    hello, <br />
    <h1><b><?= $user["nama"] ?></b></h1>
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

    <div class="card">
      <?php
      $id = $user["id"];
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
              ?> <h4 style="font-weight:bold;">Belum Membayar</h4>
            <?php
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
    <br>
    <a href="/user/pembayaran/create.php" class="btn btn-success btn-block">Tambah Data</a>
    <br>
    <div class="card">
      <div class="card-header">
        <span>Komplain</span>
      </div>
      <?php
      $id = $user["id"];
      $getDataKomplain = "SELECT * FROM komplain WHERE id_anak_kos = $id ORDER BY id DESC LIMIT 1; ";
      $res = mysqli_query($conn, $getDataKomplain)->fetch_assoc();
      ?>
      <div class="card-body">
        <div class="row">
          <div class="col-1">1</div>
          <div class="col-7">
            <h4 style="font-weight:bold;"><?= $res["judul"] ?></h4>
            <p><?= $res["deskripsi"] ?></p>
          </div>
          <?php
          $selesai = $res["selesai"] + 1;
          if ($selesai == 2) { ?>
            <div class="col-3">
              <img src="/assets/success.svg" style="width: 40px; height:40px; float:right">
            </div>
          <?php } else if ($selesai  == 1) { ?>
            <div class="col-3">
              <img src="/assets/error.svg" style="width: 40px; height:40px; float:right">
            </div>
          <?php }
          ?>
        </div>
      </div>
    </div>
    <br>
  </div>
</body>

</html>