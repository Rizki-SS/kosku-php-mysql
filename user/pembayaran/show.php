<?php
$dir = $_SERVER["DOCUMENT_ROOT"];
include($dir . "/config/conn.php");
include($dir . "/user/auth.php");

$id = $_GET["id"];
$findData = "SELECT * FROM pembayaran where id=$id";

$data = mysqli_query($conn, $findData)->fetch_assoc();
?>

<html>

<head>
  <title>Kosku - Data Anak Kos</title>
  <?php
  include($dir . "/templates/resources.php");
  ?>
</head>

<body>
  <?php
  include($dir . "/templates/navbar.php");
  ?>
  <div class="container" id="content">
    <h1>Data Pembayaran</h1><br><br>
    <div class="row">
      <div class="col-lg-6">
        <table class="table">
          <tbody>
            <tr>
              <td>Bulan</td>
              <td><?= $data["bulan"] ?></td>
            </tr>
            <tr>
              <td>Tahun</td>
              <td><?= $data["tahun"] ?></td>
            </tr>
            <tr>
              <td>Foto</td>
              <td><img src="/assets/head-bg.jpg" style="width:100%; height:auto; "></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <a href="/user/pembayaran/index.php" class="btn btn-secondary">Kembali</a>
  </div>
</body>

</html>