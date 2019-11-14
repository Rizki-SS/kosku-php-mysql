<?php
$dir = $_SERVER["DOCUMENT_ROOT"];
include($dir . "/config/conn.php");
require_once($dir . "/admin/auth.php");
session_start();
$id = $_SESSION["admin"]["id"];
session_abort();
$idPembayaran = $_GET["id"];
$findDataPembayaran = "SELECT * FROM pembayaran where id=$idPembayaran";

$data = mysqli_query($conn, $findDataPembayaran)->fetch_assoc();

$getAnakKosData = "select ak.id, ak.nama from anak_kos ak
inner join kos k on ak.id_kos = k.id
inner join admin a on k.admin_id = a.id
where a.id = $id";

$users = mysqli_query($conn, $getAnakKosData);
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

  <script>
    $(document).ready(function() {
      var id = <?= $data["id_anak_kos"] ?>;
      console.log(id);
      $("#<?= $data["id_anak_kos"] ?>").attr("selected", "selected");
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
  } else {
    $msg = $error;
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
    <form action="/admin/pembayaran/update.php" method="post" class="form-group">
      <div class="row">
        <div class="col-lg-6">
          <select class="custom-select" id="inlineFormCustomSelect" name="idanakkos">
            <option value="">Pilih</option>
            <?php
            while ($user = mysqli_fetch_assoc($users)) { ?>
              <option value="<?= $user["id"] ?>" id="<?= $user["id"] ?>"> <?= $user["nama"] ?></option>
            <?php }
            ?>
          </select><br><br>
          Pembayaran Untuk :<br />
          <div class="row">
            <div class="col-sm-6"><label for="bulan">Bulan</label>
              <input type="text" name="bulan" id="bulan" class="form-control" value="<?= $data["bulan"] ?>" /><br />
            </div>
            <div class="col-sm-6"><label for="tahun">Tahun</label>
              <input type="text" name="tahun" id="tahun" class="form-control" value="<?= $data["tahun"] ?>" /><br />
            </div>
            <input type="hidden" name="id" class="form-control" value="<?= $data["id"] ?>" /><br />
          </div>
        </div>
      </div>
      <input type="submit" value="Simpan" name="submit" class="btn btn-success" />
      <a href="/admin/pembayaran/index.php" class="btn btn-secondary">Batal</a>
    </form>

  </div>
</body>

</html>