<?php
if (isset($_POST["submit"])) {
  $dir = $_SERVER['DOCUMENT_ROOT'];
  include($dir . '/config/conn.php');


  $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
  $password = md5($_POST["password"]);

  if (
    empty($username) || 
    empty($password)
  ) {
    header("location: /login.php?error=2");
  }

  $findAdmin = "SELECT * FROM admin WHERE username='$username';";
  $res = mysqli_query($conn, $findAdmin);
  $admin = mysqli_fetch_assoc($res);

  if (!empty($admin)) {
    if ($admin["username"] == $username) {
      if ($password == $admin["password"]) {
        session_start();
        $_SESSION["admin"] = $admin;
        header("location: /admin/index.php");
      } else {
        header("location: /login.php?error=2");
      }
    } else {
      header("location: /login.php?error=1");
    }
  } else {
    $findUser = "SELECT * FROM anak_kos WHERE username='$username';";
    $res = mysqli_query($conn, $findUser);
    $user = mysqli_fetch_assoc($res);
    if ($user["username"] == $username) {
      if ($password == $user["password"]) {
        session_start();
        $_SESSION["user"] = $user;
        header("location: /user/index.php");
      } else {
        header("location: /login.php?error=2");
      }
    } else {
      header("location: /login.php?error=1");
    }
  }
}
mysqli_close($conn);