<?php 
$conn = mysqli_connect("localhost", "admin", "irfanRAFI");

$createDatabase = mysqli_query($conn, "CREATE DATABASE kosku;");

if (mysqli_error($conn)) {
  echo "Error : " . mysqli_error($conn);
}else{
  echo "Database Created";
}
?>