<?php
$dir = $_SERVER["DOCUMENT_ROOT"];
include($dir . "/config/conn.php");
require_once($dir . "/admin/auth.php");

if (empty($_POST["bulan"]) || empty($_POST["tahun"]) || empty($_POST["id"])) {
  header("location: /admin/pembayaran/create.php?error=2");
} else {
  $id = filter_var($_POST["id"], FILTER_SANITIZE_STRING);
  $idanakkos = filter_var($_POST["idanakkos"], FILTER_SANITIZE_STRING);
  $bulan = filter_var($_POST["bulan"], FILTER_SANITIZE_STRING);
  $tahun = filter_var($_POST["tahun"], FILTER_SANITIZE_STRING);

  $updatePembayaran = "UPDATE pembayaran set id_anak_kos=$idanakkos, bulan=$bulan, tahun=$tahun where id = $id;";

  mysqli_query($conn, $updatePembayaran);
  if (mysqli_error($conn)) {
    $error = mysqli_error($conn);
    header("location: /admin/pembayaran/create.php?error=$error");
  } else {
    header("location: /admin/pembayaran/index.php?msg=update_ok");
  }
}
mysqli_close($conn);