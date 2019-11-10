<?php 
if(isset($_POST["submit"])){
  $dir = $_SERVER['DOCUMENT_ROOT'];
  include($dir.'/config/conn.php');

  $username = $_POST["username"];
  $password = $_POST["password"];
  // echo $email;
  $query = "SELECT * FROM admin WHERE email='$username' OR username='$username';";
  $res = mysqli_query($conn, $query);
  $data = mysqli_fetch_assoc($res);

  if ($data["email"] == $username || $data["username"] == $username) {
    if (password_verify($password, $data["password"])) {
      session_start();
      $_SESSION["admin"] = $data;
      header("location: /admin/home.php");
    }else{
      header("location: /login.php?error=2");
    }
  }else{
    header("location: /login.php?error=1");
  }
}
?>