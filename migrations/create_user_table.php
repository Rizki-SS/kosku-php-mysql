<?php 
$dir = $_SERVER['DOCUMENT_ROOT'];
include $dir.("/conn.php");

$createTable = "CREATE TABLE user
  (id int, nama varchar(255), 
  email varchar(255), 
  password varchar(255))";

$res = mysqli_query($conn, $createTable);

if (mysqli_error($conn) != NULL) {
  echo "Error : " . mysqli_error($conn);
}

?>