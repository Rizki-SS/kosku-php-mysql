<?php
$dir = $_SERVER["DOCUMENT_ROOT"];
include($dir . "/config/conn.php");
require_once($dir . "/admin/auth.php");
$id = $_POST["delete_id"];

$deleteData = "UPDATE komplain SET selesai=1 where id = $id";

mysqli_query($conn, $deleteData);

if (mysqli_error($conn)) {
  echo mysqli_error($conn);
} else {
  header("location: /admin/komplain/index.php?msg=delete_ok");
}
