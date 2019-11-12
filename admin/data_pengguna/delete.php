<?php
$dir = $_SERVER["DOCUMENT_ROOT"];
include($dir . "/config/conn.php");
require_once($dir . "/admin/auth.php");
$id = $_GET["delete_id"];

$deleteData = "DELETE FROM anak_kos WHERE id=$id";

mysqli_query($conn, $deleteData);

if (mysqli_error($conn)) {
  echo mysqli_error($conn);
} else {
  header("location: /admin/data_pengguna/index.php?msg=delete_ok");
}
