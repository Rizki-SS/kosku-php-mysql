<?php
$dir = $_SERVER["DOCUMENT_ROOT"];
include($dir . "/config/conn.php");
require_once($dir . "/admin/auth.php");
$id = $_SESSION["admin"]["id"];
$getAnakKosData = "select ak.id, ak.nama from anak_kos ak
inner join kos k on ak.id_kos = k.id
inner join admin a on k.admin_id = a.id
where a.id = $id";

$res = mysqli_query($conn, $getAnakKosData);

if (isset($_GET["error"])) {
  $error = $_GET["error"];
} else {
  $error = "";
}
?>

<html>

<head>
  <?php include($dir . "/templates/resources.php") ?>
  <title>Kosku - Data Komplain</title>
</head>

<body>
  <?php include($dir . "/templates/navbar.php");
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
    <form action="/admin/komplain/insert.php" method="post">
      <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
            <label for="nama">Nama</label>
            <select class="custom-select" name="id">
              <option selected value="">Pilih</option>
              <?php
              while ($user = mysqli_fetch_assoc($res)) { ?>
                <option value="<?= $user["id"] ?>"><?= $user["nama"] ?></option>
              <?php }
              ?>
            </select><br><br>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-group">
            <label for="judul">Judul Komplain</label>
            <input type="text" name="judul" id="judul" class="form-control" />
          </div>
          <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3"></textarea>
          </div>
        </div>
      </div>
      <input type="submit" value="Simpan" name="submit" class="btn btn-success" />
      <a href="/admin/komplain/index.php" class="btn btn-secondary">Batal</a>
    </form>

  </div>
</body>

</html>