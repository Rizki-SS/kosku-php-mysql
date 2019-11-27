<?php
$dir = $_SERVER["DOCUMENT_ROOT"];
include($dir . "/config/conn.php");
require_once($dir . "/user/auth.php");

if (empty($_POST["bulan"]) || empty($_POST["tahun"]) || empty($_POST["id"])) {
  header("location: /user/pembayaran/create.php?error=2");
} else {
  $id = $_POST["id"];
  $bulan = $_POST["bulan"];
  $tahun = $_POST["tahun"];

  $insertPembayaran = "INSERT INTO pembayaran values(NULL, $id, $bulan, $tahun, NOW());";

  mysqli_query($conn, $insertPembayaran);
  if (mysqli_error($conn)) {
    $error = mysqli_error($conn);
    header("location: /user/pembayaran/create.php?error=$error");
  } else {
    header("location: /user/pembayaran/index.php?msg=insert_ok");
  }
}
