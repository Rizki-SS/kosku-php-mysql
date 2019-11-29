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
  $status = $_POST["status"];
  $lembaga = $_POST["lembaga"];

  if (
    empty($name) || !preg_match("/^[A-Za-z0-9_-]*$/", $name) ||
    empty($asal) || !preg_match("/^[A-Za-z0-9_-]*$/", $asal) ||
    empty($hp) || !preg_match("/^[A-Za-z0-9_-]*$/", $hp) ||
    empty($status) || !preg_match("/^[A-Za-z0-9_-]*$/", $status) ||
    empty($lembaga) || !preg_match("/^[A-Za-z0-9_-]*$/", $lembaga) ||
    empty($idKos) || !preg_match("/^[A-Za-z0-9_-]*$/", $idKos) ||
    empty($tipe) || !preg_match("/^[A-Za-z0-9_-]*$/", $tipe)
  ) {
    header("location: /admin/data_pengguna/create.php?error=2&id=$id");
  } else {
    if ($tipe == "1") {
      $tipe = 0;
    } else if ($tipe == "2") {
      $tipe = 1;
    } else {
      header("location: /admin/data_pengguna/create.php?error=2&id=$id");
    }



    // Apakah Kamar Sudah Penuh
    // 1. Menghitung jumlah kamar yang terisi
    $count = "select * from anak_kos ak
    inner join kos k on ak.id_kos = k.id
    where k.id=$id;";
    $countOutput = mysqli_query($conn, $count)->num_rows();
    echo $countOutput;

    //2. Mengambil data jumlah kamar pada tabel kos
    $max = "select kos_user from kos where id = $id";
    $MaxOutput = mysqli_query($conn, $max)->fetch_assoc();
    $max = (int) $MaxOutput["kos_user"];
    echo $max;

    if ($inserted >= $max) {
      header("location: /admin/data_pengguna/create.php?error=3&id=$id");
    } else {
      //Mencari data duplikat
      $findDuplicate = "SELECT * FROM anak_kos where hp='$hp'";
      $duplicate = mysqli_query($conn, $findDuplicate)->fetch_assoc();
      if (!empty($duplicate)) {
        header("location: /admin/data_pengguna/create.php?error=1&id=$id");
      } else {
        $insertUser = "INSERT INTO anak_kos values(NULL, 
        '$nama', '$asal', '$hp', $id, $tipe, '$status',
        '$lembaga', NULL, NULL);";
        mysqli_query($conn, $insertUser);

        if (mysqli_error($conn)) {
          echo mysqli_error($conn);
        } else {
          echo "Oke";
          header("location: /admin/data_pengguna/index.php?msg=insert_ok");
        }
      }
    }
  }
}
