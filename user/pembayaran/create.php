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
  <title>
    Kosku - Data Pembayaran
  </title>
  <?php include($dir . "/templates/resources.php"); ?>
</head>

<body>
  <?php
  if (isset($_GET["error"])) {
    $error = $_GET["error"];
  } else {
    $error = "";
  }

  if ($error == "2") {
    $msg = "Data Tidak Valid";
  } else if ($error == "1") {
    $msg = "Data Sudah Ada";
  } else if ($error == "3") {
    $msg = "Kamar Sudah Penuh";
  } else {
    $msg = $error;
  }

  ?>
  <?php include($dir . "/templates/navbar.php"); ?>
  <div class="container" id="data-table">
    <h1>Tambah Data Pembayaran</h1>
    <br /><br />
    <?php
    if (!empty($msg)) {
      ?>
      <div class="alert alert-danger alert alert-danger alert-dismissible fade show">
        <?= $msg ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php
    }
    ?>
    <form action="/user/pembayaran/insert.php" method="post" class="form-group" enctype="multipart/form-data">
      Pembayaran Untuk :
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="bulan">Bulan</label>
            <select name="bulan" id="bulan" class="custom-select">
              <option value="">Pilih</option>
              <option value="1">Januari</option>
              <option value="2">Februari</option>
              <option value="3">Maret</option>
              <option value="4">April</option>
              <option value="5">Mei</option>
              <option value="6">Juni</option>
              <option value="7">Juli</option>
              <option value="8">Agustus</option>
              <option value="9">September</option>
              <option value="10">Oktober</option>
              <option value="11">November</option>
              <option value="12">Desember</option>
            </select>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="tahun">Tahun</label>
            <input type="text" name="tahun" id="tahun" class="form-control" />
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="bukti">Upload Bukti Pembayaran</label>
            <input type="file" name="bukti" id="bukti" class="form-control" />
            <small>*Untuk pembayaran lebih dari satu bulan, silahkan upload bukti yang sama</small>
          </div>
        </div>
      </div>
      <input type="hidden" name="id" value="<?= $_SESSION["user"]["id"]?>">
      <input type="submit" value="Simpan" name="submit" class="btn btn-success" />
      <a href="/user/pembayaran/index.php" class="btn btn-secondary">Batal</a>
    </form>

  </div>
</body>

</html>