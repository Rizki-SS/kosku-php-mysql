<?php
$dir = $_SERVER["DOCUMENT_ROOT"];
include($dir . "/config/conn.php");
require_once($dir . "/admin/auth.php");
?>

<html>

<head>
  <title>
    Kosku - Data Pengguna
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
    <h1>Tambah Data Anak Kos</h1>

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
    <form action="/admin/data_pengguna/insert.php" method="post">
      <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" />
          </div>
          <div class="form-group">
            <label for="asal">Asal</label>
            <input type="text" name="asal" id="asal" class="form-control" />
          </div>
          <div class="form-group">
            <label for="status">Status</label>
            <input type="text" name="status" id="status" class="form-control" />
          </div>
          <div class="form-group">
            <label for="lembaga">Lembaga</label>
            <input type="text" name="lembaga" id="lembaga" class="form-control" />
          </div>
          <input type="text" name="idkos" value="<?= $_GET["id"] ?>" style="display:none;">
        </div>
        <div class="col-lg-6">
          <div class="form-group">
            <label for="nohp">No. HP</label>
            <input type="text" name="nohp" id="nohp" class="form-control" />
          </div>
          <div class="form-group">
            <label for="tipekos">Tipe Kos</label>
            <select class="custom-select  " id="inlineFormCustomSelect" name="tipe">
              <option selected value="0">Pilih</option>
              <option value="1">Kamar Mandi Luar</option>
              <option value="2">Kamar Mandi Dalam</option>
            </select>
          </div>
        </div>
      </div>
      <input type="submit" value="Simpan" name="submit" class="btn btn-success" />
      <a href="/admin/data_pengguna/index.php" class="btn btn-secondary">Batal</a>
    </form>

  </div>
</body>

</html>