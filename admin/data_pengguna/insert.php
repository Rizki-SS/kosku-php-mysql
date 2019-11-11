<?php
$dir = $_SERVER["DOCUMENT_ROOT"];
include($dir . "/config/conn.php");
require_once($dir . "/admin/auth.php");



if (isset($_POST["submit"])) {
  $nama = $_POST["nama"];
  $asal = $_POST["asal"];
  $hp = $_POST["nohp"];
  $tipe = $_POST["tipe"];
  $id = $_POST["idkos"];

  if (empty($nama) || empty($asal) || empty($hp) || empty($tipe)) {
    header("location: /admin/data_pengguna/create.php?error=2&id=$id");
  } else {
    if ($tipe == "1") {
      $tipe = 0;
    } else if ($tipe == "2") {
      $tipe = 1;
    } else {
      header("location: /admin/data_pengguna/create.php?error=2&id=$id");
    }

    $findDuplicate = "SELECT * FROM anak_kos where hp='$hp'";
    $duplicate = mysqli_query($conn, $findDuplicate)->fetch_assoc();

    if (!empty($duplicate)) {
      header("location: /admin/data_pengguna/create.php?error=1&id=$id");
    } else {
      $insertUser = "INSERT INTO anak_kos values(NULL, '$nama', '$asal', '$hp', $id, $tipe);";
      mysqli_query($conn, $insertUser);

      if (mysqli_error($conn)) {
        echo mysqli_error($conn);
      } else {
        header("location: /admin/data_pengguna/index.php?msg=insert_ok");
      }
    }
  }
}
