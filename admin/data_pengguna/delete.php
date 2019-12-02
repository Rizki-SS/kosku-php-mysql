<?php
$dir = $_SERVER["DOCUMENT_ROOT"];
include($dir . "/config/conn.php");
require_once($dir . "/admin/auth.php");
$id = $_GET["delete_id"];

$deleteData = "DELETE FROM anak_kos WHERE id=$id";



try {
  mysqli_query($conn, $deleteData);
  header("location: /admin/data_pengguna/index.php?msg=delete_ok");
} catch (\Throwable $th) {
  header("location: /admin/data_pengguna/index.php?msg=$th");
}

mysqli_close($conn);