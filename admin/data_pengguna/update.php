<?php
$dir = $_SERVER["DOCUMENT_ROOT"];
include($dir . "/config/conn.php");
require_once($dir . "/admin/auth.php");



if (isset($_POST["submit"])) {
  $nama = $_POST["nama"];
  $asal = $_POST["asal"];
  $hp = $_POST["nohp"];
  $tipe = $_POST["tipe"];
  $id = $_POST["id"];
  $status = $_POST["status"];
  $lembaga = $_POST["lembaga"];

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
