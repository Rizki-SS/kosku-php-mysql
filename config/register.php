<?php
$dir = $_SERVER["DOCUMENT_ROOT"];
include($dir . "/config/conn.php");
if (isset($_POST["daftar"])) {
  if ($_POST["tipeUser"] == "pemilikKos") {
<<<<<<< HEAD
    $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
    $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
    $password = md5($_POST["password"]);
=======
    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = $password = md5($_POST["password"]);
>>>>>>> master

    if (empty($name) || !preg_match("/^[A-Za-z0-9 ._-]*$/", $name) ||
    empty($password) || !preg_match("/^[A-Za-z0-9 ._-]*$/", $password) ||
    empty($username) || !preg_match("/^[A-Za-z0-9 ._-]*$/", $username)
    ) {
      header("location: /daftar.php?error=2");
    } else {
      $findUsername = "SELECT * FROM admin WHERE username='$username';";
      $res = mysqli_query($conn, $findUsername);
      $data = mysqli_fetch_assoc($res);

      if (!empty($data)) {
        header("location: /daftar.php?error=1");
      } else {
        $insert = "INSERT INTO admin values (NULL, '$name','$username', '$password');";
        $res = mysqli_query($conn, $insert);
        if (mysqli_error($conn)) {
          $error = mysqli_error($conn);
          header("location: /daftar.php?error=$error");
        } else {
          $findId = "SELECT id FROM admin where username='$username'";
          $id = mysqli_fetch_assoc(mysqli_query($conn, $findId));
          header("location: /kos-daftar.php?id=$id[id]");
        }
      }
    }
  } else if ($_POST["tipeUser"] == "anakKos") {
<<<<<<< HEAD
    $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
    $asal = filter_var($_POST["asal"], FILTER_SANITIZE_STRING);
    $hp = filter_var($_POST["hp"], FILTER_SANITIZE_STRING);
    $status = filter_var($_POST["status"], FILTER_SANITIZE_STRING);
    $lembaga = filter_var($_POST["lembaga"], FILTER_SANITIZE_STRING);
    $tipe = filter_var($_POST["tipeKamar"], FILTER_SANITIZE_STRING);
    $idKos = filter_var($_POST["id_kos"], FILTER_SANITIZE_STRING);
    $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
=======
    $name = $_POST["name"];
    $asal = $_POST["asal"];
    $hp = $_POST["hp"];
    $status = $_POST["status"];
    $lembaga = $_POST["lembaga"];
    $tipe = $_POST["tipeKamar"];
    $idKos = $_POST["id_kos"];
    $username = $_POST["username"];
>>>>>>> master
    $password = md5($_POST["password"]);

    if (
      empty($name) || !preg_match("/^[A-Za-z0-9 ._-]*$/", $name) ||
      empty($asal) || !preg_match("/^[A-Za-z0-9 ._-]*$/", $asal) ||
      empty($hp) || !preg_match("/^[A-Za-z0-9 ._-]*$/", $hp) ||
      empty($status) || !preg_match("/^[A-Za-z0-9 ._-]*$/", $status) ||
      empty($lembaga) || !preg_match("/^[A-Za-z0-9 ._-]*$/", $lembaga) ||
      empty($idKos) || !preg_match("/^[A-Za-z0-9 ._-]*$/", $idKos) ||
      empty($username) || !preg_match("/^[A-Za-z0-9 ._-]*$/", $username) ||
      empty($password) ||
      empty($tipe) || !preg_match("/^[A-Za-z0-9_-]*$/", $tipe)
    ) {
      header("location: /daftar.php?error=2");
    } else {
      $findUser = "SELECT * FROM anak_kos where username='$username'";
      $dupUser = mysqli_query($conn, $findUser);
      $dupUser = $dupUser->fetch_assoc();
      if (!empty($dupUser)) {
        header("location: /daftar.php?error=1");
      } else {
        $tipe = $tipe - 1;

        $insert = "INSERT INTO anak_kos values(
          NULL, '$name', '$asal', '$hp', $idKos, $tipe, 
          '$status', '$lembaga', '$username', '$password'
        );";
        mysqli_query($conn, $insert);

        if (mysqli_error($conn)) {
          header("location: /daftar.php?error=" . mysqli_errno($conn));
        } else {
          header("location: /login.php");
        }
      }
    }
  }
}
