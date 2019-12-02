<?php
$dir = $_SERVER["DOCUMENT_ROOT"];
include($dir . "/config/conn.php");
require_once($dir . "/admin/auth.php");

$id = $_GET["verify_id"];
$verifyPembayaran = "UPDATE pembayaran set verified = 2 where id_anak_kos = ". $id;

if (mysqli_query($conn, $verifyPembayaran)) {
  header("location: /admin/pembayaran/index.php?msg=verify_ok");
}else{
  $errno=  mysqli_errno($conn);
  header("location: /admin/pembayaran/index.php?error=".$errno);
}