<?php
$dir = $_SERVER["DOCUMENT_ROOT"];
include($dir . "/config/conn.php");
require_once($dir . "/user/auth.php");

if (isset($_POST["submit"])) {
  $id = $_SESSION["user"]["id"];
  $judul = filter_var($_POST["judul"], FILTER_SANITIZE_STRING);
  $deskripsi = filter_var($_POST["deskripsi"], FILTER_SANITIZE_STRING);

  if (empty($id) || empty($judul) || empty($deskripsi)) {
    header("location: /user/komplain/create.php?error=2");
  } else {
    $insertKomplain = "INSERT INTO komplain values(NULL, $id, '$judul', '$deskripsi', NOW(), 0)";
    try {
      mysqli_query($conn, $insertKomplain);
      header("location: /user/komplain/index.php?msg=insert_ok");
    } catch (\Throwable $th) {
      header("location: /user/komplain/create.php?error=$th");
    }
  }
}
mysqli_close($conn);