<?php
$dir = $_SERVER["DOCUMENT_ROOT"];
include($dir . "/config/conn.php");

if (isset($_POST["daftar"])) {

  $nama = filter_var($_POST["nama"], FILTER_SANITIZE_STRING);
  $alamat = filter_var($_POST["alamat"], FILTER_SANITIZE_STRING);
  $jumlahKamar = filter_var($_POST["jumlahkamar"], FILTER_SANITIZE_STRING);
  $kamarMandiDalam = filter_var($_POST["kamarMandiDalam"], FILTER_SANITIZE_STRING);
  $kamarMandiLuar = filter_var($_POST["kamarMandiLuar"], FILTER_SANITIZE_STRING);
  $id = $_POST["id"];

  if (empty($nama) || empty($alamat) || empty($jumlahKamar) || empty($id)) {
    header("location: /kos-daftar.php?error=2");
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
mysqli_close($conn);
?>