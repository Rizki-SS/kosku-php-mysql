<?php
$dir = $_SERVER["DOCUMENT_ROOT"];
include($dir . "/config/conn.php");
require_once($dir . "/admin/auth.php");
session_start();
$id = $_SESSION["admin"]["id"];
session_abort();
$getAnakKosData = "select ak.id, ak.nama from anak_kos ak
inner join kos k on ak.id_kos = k.id
inner join admin a on k.admin_id = a.id
where a.id = $id";

$res = mysqli_query($conn, $getAnakKosData);
?>

<html>

<head>
  <title>
    Kosku - Data Pengguna
  </title>
  <?php include($dir . "/templates/resources.php"); ?>
  <script>
    $(document).ready(function() {
      var id = <?= $_GET["id"] ?>;
      console.log(id);
      $("#<?= $_GET["id"] ?>").attr("selected", "selected");
    });
  </script>
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
    <form action="/admin/pembayaran/insert.php" method="post" class="form-group">
      <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
            <select class="custom-select  " id="inlineFormCustomSelect" name="id">
              <option selected value="">Pilih</option>
              <?php
              while ($user = mysqli_fetch_assoc($res)) { ?>
                <option value="<?= $user["id"] ?>" id="<?= $user["id"] ?>"><?= $user["nama"] ?></option>
              <?php }
              ?>
            </select>
          </div>
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
        </div>
      </div>
      <input type="submit" value="Simpan" name="submit" class="btn btn-success" />
      <a href="/admin/pembayaran/index.php" class="btn btn-secondary">Batal</a>
    </form>

  </div>
</body>

</html>