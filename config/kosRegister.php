<?php
$dir = $_SERVER["DOCUMENT_ROOT"];
include($dir . "/config/conn.php");

if (isset($_POST["daftar"])) {

<<<<<<< HEAD
  $nama = filter_var($_POST["nama"], FILTER_SANITIZE_STRING);
  $alamat = filter_var($_POST["alamat"], FILTER_SANITIZE_STRING);
  $jumlahKamar = filter_var($_POST["jumlahkamar"], FILTER_SANITIZE_STRING);
  $kamarMandiDalam = filter_var($_POST["kamarMandiDalam"], FILTER_SANITIZE_STRING);
  $kamarMandiLuar = filter_var($_POST["kamarMandiLuar"], FILTER_SANITIZE_STRING);
  $id = $_POST["id"];

  if (empty($nama) || empty($alamat) || empty($jumlahKamar) || empty($id)) {
    header("location: /kos-daftar.php?error=2");
=======
  $nama = $_POST["nama"];
  $alamat = $_POST["alamat"];
  $jumlahKamar = $_POST["jumlahkamar"];
  $kamarMandiDalam = $_POST["kamarMandiDalam"];
  $kamarMandiLuar = $_POST["kamarMandiLuar"];
  $id = $_POST["id"];

  if (
    empty($nama)            || !preg_match("/^[A-Za-z0-9 ._-]*$/", $nama) ||
    empty($alamat)          || !preg_match("/^[A-Za-z0-9 ._-]*$/", $alamat) ||
    empty($jumlahKamar)     || !preg_match("/^[A-Za-z0-9 ._-]*$/", $jumlahKamar) ||
    empty($id)              || !preg_match("/^[A-Za-z0-9 ._-]*$/", $id) ||
    empty($kamarMandiDalam) || !preg_match("/^[A-Za-z0-9 ._-]*$/", $kamarMandiDalam) ||
    empty($kamarMandiLuar)  || !preg_match("/^[A-Za-z0-9 ._-]*$/", $kamarMandiLuar)
  ) {
    echo $nama . $alamat . $jumlahKamar . $id . $kamarMandiLuar . $kamarMandiDalam;
    // header("location: /kos-daftar.php?error=3&id=" . $id);
>>>>>>> master
  } else {
    $insert = "INSERT INTO kos values (NULL, '$nama', '$alamat', $id, $jumlahKamar, $kamarMandiDalam, $kamarMandiLuar);";
    mysqli_query($conn, $insert);

    if (mysqli_error($conn)) {
      $error = $error . mysqli_error($conn);
      header("location: /kos-daftar.php?error=$error&id=$id");
    } else {
      header("location: /login.php");
    }
  }
}
?>