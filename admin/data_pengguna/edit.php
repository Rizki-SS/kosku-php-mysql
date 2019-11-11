<?php
$dir = $_SERVER["DOCUMENT_ROOT"];
include($dir . "/config/conn.php");
require_once($dir . "/admin/auth.php");

$userId = $_GET["id"];
$getData = "SELECT * FROM anak_kos where id=$userId;";
$data = mysqli_query($conn, $getData)->fetch_assoc();

if (mysqli_error($conn)) {
  echo mysqli_error($conn);
}

?>

<html>

<head>
  <title>
    Kosku - Data Pengguna
  </title>
  <?php include($dir . "/templates/resources.php"); ?>
  <style>
    #data-table {
      padding-top: 100px;
    }
  </style>
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
  }

  ?>
  <?php include($dir . "/templates/navbar.php"); ?>
  <div class="container" id="data-table">
    <h1>Tambah Data Pengguna</h1>
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
    <form action="/admin/data_pengguna/update.php" method="post" class="form-group">
      <div class="row">
        <div class="col-lg-6">
          <label for="nama">Nama</label><br />
          <input type="text" name="nama" id="nama" class="form-control" value="<?= $data["nama"] ?>" /><br />
          <label for="asal">Asal</label><br />
          <input type="text" name="asal" id="asal" class="form-control" value="<?= $data["asal"] ?>" /><br />
          <input type="text" name="idkos" value="<?= $data["id"] ?>" style="display:none;">
        </div>
        <div class="col-lg-6">
          <label for="nohp">No. HP</label><br />
          <input type="text" name="nohp" id="nohp" class="form-control" value="<?= $data["hp"] ?>" /><br />
          <label for="tipekos">Tipe Kos</label><br />
          <select class="custom-select  " id="inlineFormCustomSelect" name="tipe">
            <option selected value="0">Pilih</option>
            <option value="1">Kamar Mandi Luar</option>
            <option value="2">Kamar Mandi Dalam</option>
          </select>
        </div>
      </div>
      <input type="submit" value="Simpan" name="submit" class="btn btn-success" />
    </form>
  </div>
</body>

</html>