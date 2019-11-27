<?php
$dir = $_SERVER["DOCUMENT_ROOT"];
include($dir . "/config/conn.php");
require_once($dir . "/user/auth.php");
session_start();
$id = $_SESSION["user"]["id"];
session_abort();

if (isset($_GET["showall"])) {
  $getDataKomplain = "SELECT * FROM komplain WHERE id_anak_kos = $id";
} else {
  $getDataKomplain = "SELECT * FROM komplain WHERE id_anak_kos = $id ORDER BY id DESC LIMIT 1; ";
}

$komplains = mysqli_query($conn, $getDataKomplain);
?>
<html>

<head>
  <title>
    Kosku - Data Komplain
  </title>
  <?php include($dir . "/templates/resources.php"); ?>
  <style>
    .card-komplain {
      margin-top: 25px;
      margin-bottom: 25px;
    }
  </style>
  <script>
    $(document).ready(function() {
      $("#msgAlert").slideDown();
      $("#msgAlert").delay(3000);
      $("#msgAlert").slideUp();

      $('.deleteData').click(function() {
        var ID = $(this).data('id');
        console.log(ID);
        $('#hapusAja').data('id', ID);
        $("#delete_id").val(ID);
      });
    });
  </script>
</head>

<body>
  <?php include($dir . "/templates/navbar.php"); ?>
  <div class="container" id="data-table">
    <h1>Data Komplain</h1>
    <br /><br />
    <?php
    if (isset($_GET["msg"])) {
      $msg = $_GET["msg"];
      if ($msg == "insert_ok") {
        $msg = "Data Berhasil Disimpan";
      } else if ($msg == "delete_ok") {
        $msg = "Data Berhasil Dihapus";
      } else {
        $msg = "";
      }
    }

    if (!empty($msg)) {
      ?>
      <div class="alert alert-success" id="msgAlert" style="display:none;">
        <?= $msg ?>
      </div>
    <?php } ?>
    <a href="/user/komplain/create.php" class="btn btn-success"> <i class="fa fa-plus"></i> Tambah Data</a>
    <?php
    while ($komplain = mysqli_fetch_assoc($komplains)) { ?>
      <div class="card card-komplain">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-8">
              <h2><?= $komplain["judul"] ?></h2>
              <p>
                <?= $komplain["deskripsi"] ?>
              </p>
            </div>
            <div class="col-sm-3 float-right text-right">
              <h6><?= $komplain["tanggal"] ?></h6>
            </div>
          </div>
        </div>
      </div>
    <?php
    } ?>

    <a href="/user/komplain/index.php?showall=y" class="btn btn-warning">Tampilkan Semua Komplain</a>
  </div>
</body>

</html>