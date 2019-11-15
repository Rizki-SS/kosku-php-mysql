<?php
$dir = $_SERVER["DOCUMENT_ROOT"];
include($dir . "/config/conn.php");
require_once($dir . "/admin/auth.php");
?>

<html>

<head>
  <?php include($dir . "/templates/resources.php") ?>
  <title>Kosku - Data Komplain</title>
</head>

<body>
  <?php include($dir . "/templates/navbar.php") ?>
  <div class="container" id="data-table">
    <h1>Tambah Data Komplain</h1>
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
    <form action="/admin/komplain/insert.php" method="post" class="form-group">
      <div class="row">
        <div class="col-lg-6">
          <label for="nama">Nama</label><br />
          <input type="text" name="nama" id="nama" class="form-control" /><br />
          <label for="asal">Asal</label><br />
          <input type="text" name="asal" id="asal" class="form-control" /><br />
          <input type="text" name="idkos" value="<?= $_GET["id"] ?>" style="display:none;">
        </div>
        <div class="col-lg-6">
          <label for="nohp">No. HP</label><br />
          <input type="text" name="nohp" id="nohp" class="form-control" /><br />
          <label for="tipekos">Tipe Kos</label><br />
          <select class="custom-select  " id="inlineFormCustomSelect" name="tipe">
            <option selected value="0">Pilih</option>
            <option value="1">Kamar Mandi Luar</option>
            <option value="2">Kamar Mandi Dalam</option>
          </select>
        </div>
      </div>
      <input type="submit" value="Simpan" name="submit" class="btn btn-success" />
      <a href="/admin/data_pengguna/index.php" class="btn btn-secondary">Batal</a>
    </form>

  </div>
</body>

</html>