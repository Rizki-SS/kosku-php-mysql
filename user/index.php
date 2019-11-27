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
      <div class="card-header">
        <span>Pembayaran Bulan Ini</span>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-6">
            <h4 style="font-weight:bold;">Sudah Membayar</h4>
          </div>
          <div class="col-6">
            <p style="text-align:right;">Dibayar Pada Tanggal 01-01-1920</p>
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
      <div class="card-body">
        <div class="row">
          <div class="col-1">1</div>
          <div class="col-7">
            <h4 style="font-weight:bold;">Judul Komplain</h4>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Qui repellendus doloremque ipsam illum dignissimos quidem deleniti accusantium porro distinctio deserunt cum iure officiis, amet voluptates. Ipsa officiis quos possimus reprehenderit!</p>
          </div>
          <div class="col-3">
            <img src="/assets/success.svg" style="width: 40px; height:40px; float:right">
          </div>
        </div>
      </div>
    </div>
    <br>
  </div>
</body>

</html>