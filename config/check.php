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


  if ($data["email"] == $email) {
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