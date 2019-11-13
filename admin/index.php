<?php
$dir = $_SERVER["DOCUMENT_ROOT"];
include($dir . "/admin/auth.php");
include($dir . "/config/conn.php");
session_start();
$admin = $_SESSION["admin"];
session_abort();

$msg = $_GET["msg"];
if ($msg == "user_update_ok") {
  $msg = "Data Anda Berhasil Diubah";
} else if ($msg == "delete_ok") {
  $msg = "Data Berhasil Dihapus";
} else {
  $msg = "";
}
?>

<html>

<head>
  <?php include($dir . "/templates/resources.php") ?>
  <title>Kosku - Home</title>
</head>

<body>
  <?php include($dir . "/templates/navbar.php") ?>
  <div class="container" style="margin-top: 100px;">
    hello, <br />
    <h1><b><?= $admin["name"] ?></b></h1>
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

    <div class="row">
      <div class="col-lg-4">
        <div class="card">
          <div class="card-body">
            <?php
            $count = "select count(*) as inserted from anak_kos ak
                  inner join kos k on ak.id_kos = k.id
                  inner join admin a on k.admin_id = a.id
                  where a.id=$admin[id];";
            $countOutput = mysqli_query($conn, $count);
            $inserted = $countOutput->fetch_assoc();
            $inserted = (int) $inserted["inserted"];

            //2. Mengambil data jumlah kamar pada tabel kos
            $max = "select kos_user from kos k
            inner join admin a on k.admin_id = a.id
            where a.id = $admin[id]";
            $MaxOutput = mysqli_query($conn, $max);
            $MaxOutput = mysqli_fetch_assoc($MaxOutput);
            $max = (int) $MaxOutput["kos_user"];
            ?>
            <span>Jumlah Anak Kos</span>
            <h1><b><?= $inserted ?></b> <small> / <?= $max ?></small></h1>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card">
          <div class="card-body">
            <span>Terbayar Bulan Ini</span>
            <h1><b>0</b> <small> / <?= $inserted ?></small></h1>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card">
          <div class="card-body">
            <span>Komplain</span>
            <h1>0</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>