<?php
$dir = $_SERVER["DOCUMENT_ROOT"];
include($dir . "/config/conn.php");
require_once($dir . "/admin/auth.php");

if (isset($_POST["submit"])) {
  $id = filter_var($_POST["id"], FILTER_SANITIZE_STRING);
  $judul = filter_var($_POST["judul"], FILTER_SANITIZE_STRING);
  $deskripsi = filter_var($_POST["deskripsi"], FILTER_SANITIZE_STRING);

  if (empty($id) || empty($judul) || empty($deskripsi)) {
    header("location: /admin/komplain/create.php?error=2");
  } else {
    $insertKomplain = "INSERT INTO komplain values(NULL, $id, '$judul', '$deskripsi', NOW(), 0)";
    try {
      mysqli_query($conn, $insertKomplain);
      header("location: /admin/komplain/index?msg=insert_ok");
    } catch (\Throwable $th) {
      header("location: /admin/komplain/create.php?error=$th");
    }
  }
}
