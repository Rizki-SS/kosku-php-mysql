<?php
$dir = $_SERVER["DOCUMENT_ROOT"];
include($dir . "/config/conn.php");
require_once($dir . "/admin/auth.php");



if (isset($_POST["submit"])) {
  $nama = filter_var($_POST["nama"], FILTER_SANITIZE_STRING);
  $asal = filter_var($_POST["asal"], FILTER_SANITIZE_STRING);
  $hp = filter_var($_POST["nohp"], FILTER_SANITIZE_STRING);
  $tipe = filter_var($_POST["tipe"], FILTER_SANITIZE_STRING);
  $id = filter_var($_POST["id"], FILTER_SANITIZE_STRING);
  $status = filter_var($_POST["status"], FILTER_SANITIZE_STRING);
  $lembaga = filter_var($_POST["lembaga"], FILTER_SANITIZE_STRING);

  if (empty($nama) || empty($asal) || empty($hp) || empty($tipe) || $tipe == "0") {
    header("location: /admin/data_pengguna/edit.php?error=2&id=$id");
  } else {
    if ($tipe == "1") {
      $tipe = 0;
    } else if ($tipe == "2") {
      $tipe = 1;
    } else {
      header("location: /admin/data_pengguna/edit.php?error=2&id=$id");
    }

    $insertUser = "UPDATE anak_kos SET nama = '$nama', asal = '$asal', 
    hp = '$hp', tipe = $tipe, lembaga = '$lembaga', status = '$status'
    where id = $id";
    mysqli_query($conn, $insertUser);

    if (mysqli_error($conn)) {
      echo mysqli_error($conn);
    } else {
      header("location: /admin/data_pengguna/index.php?msg=insert_ok");
    }
  }
}
mysqli_close($conn);