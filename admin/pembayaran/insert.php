<?php
$dir = $_SERVER["DOCUMENT_ROOT"];
include($dir . "/config/conn.php");
require_once($dir . "/admin/auth.php");

if (empty($_POST["bulan"]) || empty($_POST["tahun"]) || empty($_POST["id"])) {
  header("location: /admin/pembayaran/create.php?error=2");
} else {
  $id = filter_var($_POST["id"], FILTER_SANITIZE_STRING);
  $bulan = filter_var($_POST["bulan"], FILTER_SANITIZE_STRING);
  $tahun = filter_var($_POST["tahun"], FILTER_SANITIZE_STRING);

  $insertPembayaran = "INSERT INTO pembayaran values(NULL, $id, $bulan, $tahun, NOW(), 2);";

  mysqli_query($conn, $insertPembayaran);
  if (mysqli_error($conn)) {
    $error = mysqli_error($conn);
    header("location: /admin/pembayaran/create.php?error=$error");
  } else {
    header("location: /admin/pembayaran/index.php?msg=insert_ok");
  }
}
mysqli_close($conn);