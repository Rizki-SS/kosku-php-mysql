<?php 
$db_host = "localhost";
$db_username = "admin";
$db_password = "irfanRAFI";
$db_name = "kosku";
$dir = $_SERVER['DOCUMENT_ROOT'];

$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if (mysqli_connect_error()) {
  echo "Error : " . mysqli_connect_error();
}
?>