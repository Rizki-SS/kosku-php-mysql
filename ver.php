<?php 
$dir = $_SERVER['DOCUMENT_ROOT'];
include($dir.'/conn.php');

$email = $_POST["email"];
$password = $_POST["password"];
// echo $email;
$query = 'SELECT * FROM user WHERE email="'.$email.'";';
$res = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($res);

if ($data["email"] == $email) {
  if (password_verify($password, $data["password"])) {
    session_start();
    $_SESSION["user"] = $data;
    header("location: /welcome.php");
  }
}
?>