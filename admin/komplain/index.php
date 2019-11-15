<?php
$dir = $_SERVER["DOCUMENT_ROOT"];
include($dir . "/config/conn.php");
require_once($dir . "/admin/auth.php");
session_start();
$id = $_SESSION["admin"]["id"];
session_abort();

$getDataKomplain = "select ak.nama, judul, deskripsi, tanggal, selesai from komplain
inner join anak_kos ak on komplain.id_anak_kos = ak.id
inner join kos k on ak.id_kos = k.id
inner join admin a on k.admin_id = a.id
where a.id = $id";

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
</head>

<body>
  <?php include($dir . "/templates/navbar.php"); ?>
  <div class="container" id="data-table">
    <h1>Data Komplain</h1>
    <br /><br />
    <?php
    if (!empty($msg)) {
      ?>
      <div class="alert alert-success" id="msgAlert" style="display:none;">
        <?= $msg ?>
      </div>
    <?php
    }
    ?>
    <a href="/admin/komplain/create.php" class="btn btn-success"> <i class="fa fa-plus"></i> Tambah Data</a>
    <?php
    $i = 1;
    while ($komplain = mysqli_fetch_assoc($komplains)) { ?>
      <div class="card card-komplain">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-1">
              <h1><?= $i ?></h1>
            </div>
            <div class="col-sm-8">
              <h2><?= $komplain["judul"] ?></h2>
              <p>
                <?= $komplain["deskripsi"] ?>
              </p>
            </div>
            <div class="col-sm-3 float-right text-right">
              <h6><?= $komplain["tanggal"] ?></h6>
              <h6><?= $komplain["nama"] ?></h6>
              <a class="btn btn-dark" href="">Tandai Sudah Selesai</a>
            </div>
          </div>
        </div>
      </div>
    <?php
      $i++;
    }
    ?>
  </div>
</body>

</html>