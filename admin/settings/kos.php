<?php
$dir = $_SERVER["DOCUMENT_ROOT"];
include($dir . "/admin/auth.php");
include($dir . "/config/conn.php");
session_start();
$admin = $_SESSION["admin"];
session_abort();

$getKosData = "SELECT * FROM kos where admin_id=$admin[id]";
$res = mysqli_query($conn, $getKosData);
$res = $res->fetch_assoc();

if (isset($_POST["submit"])) {
  $id = filter_var($_POST["id"], FILTER_SANITIZE_STRING);;
  $name = filter_var($_POST["nama"], FILTER_SANITIZE_STRING);
  $address = filter_var($_POST["alamat"], FILTER_SANITIZE_STRING);
  $jumlahKamar = filter_var($_POST["jumlah_kamar"], FILTER_SANITIZE_STRING);
  $kamarMandiDalam = filter_var($_POST["kamarMandiDalam"], FILTER_SANITIZE_STRING);
  $kamarMandiLuar = filter_var($_POST["kamarMandiLuar"], FILTER_SANITIZE_STRING);

  $updateKos = "UPDATE kos set name='$name', address='$address', kos_user=$jumlahKamar, harga_kamar_mandi_dalam=$kamarMandiDalam, harga_kamar_mandi_luar=$kamarMandiLuar where id=$id";
  mysqli_query($conn, $updateKos);

  if (mysqli_error($conn)) {
    echo mysqli_error($conn);
  } else {
    header("location: /admin/index.php?msg=kos_update_ok");
  }
}
mysqli_close($conn);
?>

<html>

<head>
  <?php include($dir . "/templates/resources.php") ?>
  <title>
    Kosku - Pengaturan Kos
  </title>
</head>

<body>
  <?php include($dir . "/templates/navbar.php") ?>
  <div class="container" style="margin-top: 100px;">
    <h1>Pengaturan Kos</h1>

    <form action="/admin/settings/kos.php" method="post">
      <div class="row">
        <div class="col-lg-6">
          <label for="id">ID Kos</label><br />
          <input type="text" name="id" id="id" class="form-control" value="<?= $res["id"] ?>" readonly /><br />
          <label for="nama">Nama</label><br />
          <input type="text" name="nama" id="nama" class="form-control" value="<?= $res["name"] ?>" /><br />
          <label for="alamat">Alamat</label><br />
          <input type="text" name="alamat" id="alamat" class="form-control" value="<?= $res["address"] ?>" /><br />
        </div>
        <div class="col-lg-6">
          <label for="jumlah_kamar">Jumlah Kamar</label><br />
          <input type="text" name="jumlah_kamar" id="jumlah_kamar" class="form-control" value="<?= $res["kos_user"] ?>" /><br />
          <label for="kamarMandiDalam">Harga Kamar Mandi Dalam</label><br />
          <input type="text" name="kamarMandiDalam" id="kamarMandiDalam" class="form-control" value="<?= $res["harga_kamar_mandi_dalam"] ?>" /><br />
          <label for="kamarMandiLuar">Harga Kamar Mandi Luar</label><br />
          <input type="text" name="kamarMandiLuar" id="kamarMandiLuar" class="form-control" value="<?= $res["harga_kamar_mandi_luar"] ?>" /><br />
        </div>
      </div>
      <input type="submit" value="Simpan" name="submit" class="btn btn-success" />
      <a href="/admin/data_pengguna/index.php" class="btn btn-secondary">Batal</a>
    </form>
  </div>


</body>

</html>