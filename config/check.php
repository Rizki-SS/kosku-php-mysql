<?php 
if(isset($_POST["submit"])){
  $dir = $_SERVER['DOCUMENT_ROOT'];
  include($dir.'/config/conn.php');

  $email = $_POST["email"];
  $password = $_POST["password"];
  // echo $email;
  $query = 'SELECT * FROM user WHERE email="'.$email.'";';
  $res = mysqli_query($conn, $query);
  $data = mysqli_fetch_assoc($res);

  session_start();
  if ($data["email"] == $email) {
    if (password_verify($password, $data["password"])) {
      $_SESSION["user"] = $data;
      header("location: /welcome.php");
    }else{
      $_SESSION["error"] = "Password Salah";
      header("location: /login.php");
    }
  }else{
    $_SESSION["error"] = "Username Salah";
    header("location: /login.php");
  }
}
?>