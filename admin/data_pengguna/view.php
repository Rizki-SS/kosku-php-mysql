<?php
$dir = $_SERVER["DOCUMENT_ROOT"];
include($dir . "/config/conn.php");
include($dir . "/admin/auth.php");

$id = $_GET["id"];
$findData = "SELECT * FROM anak_kos where id=$id";

$data = mysqli_query($conn, $findData)->fetch_assoc();
mysqli_close($conn);
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
    <h1>Data Anak Kos</h1><br><br>
    <div class="row">
      <div class="col-lg-6">
        <table class="table">
          <tbody>
            <tr>
              <td>Nama</td>
              <td><?= $data["nama"] ?></td>
            </tr>
            <tr>
              <td>Asal</td>
              <td><?= $data["asal"] ?></td>
            </tr>
            <tr>
              <td>No. HP</td>
              <td><?= $data["hp"] ?></td>
            </tr>
            <tr>
              <td>Tipe Kamar</td>
              <td><?= $data["tipe"] ?></td>
            </tr>
            <tr>
              <td>Status</td>
              <td><?= $data["status"] ?></td>
            </tr>
            <tr>
              <td>Lembaga</td>
              <td><?= $data["lembaga"] ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <a href="/admin/data_pengguna/index.php" class="btn btn-secondary">Kembali</a>
  </div>
</body>

</html>