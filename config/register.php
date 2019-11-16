<?php
$dir = $_SERVER["DOCUMENT_ROOT"];
include($dir . "/config/conn.php");
if (isset($_POST["daftar"])) {
  if ($_POST["tipeUser"] == "pemilikKos") {
    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    if (empty($name) || empty($password) || empty($username)) {
      header("location: daftar.php?error=2");
    } else {
      $findUsername = "SELECT * FROM admin WHERE username='$username';";
      $res = mysqli_query($conn, $findUsername);
      $data = mysqli_fetch_assoc($res);

      if (!empty($data)) {
        header("location: daftar.php?error=1");
      } else {
        $insert = "INSERT INTO admin values (NULL, '$name','$username', '$password');";
        $res = mysqli_query($conn, $insert);
        if (mysqli_error($conn)) {
          $error = mysqli_error($conn);
          header("location: daftar.php?error=$error");
        } else {
          $findId = "SELECT id FROM admin where username='$username'";
          $id = mysqli_fetch_assoc(mysqli_query($conn, $findId));
          header("location: /kos-daftar.php?id=$id[id]");
        }
      }
    }
  } else if ($_POST["tipeUser"] == "anakKos") {
    $name = $_POST["name"];
    $asal = $_POST["asal"];
    $hp = $_POST["hp"];
    $status = $_POST["status"];
    $lembaga = $_POST["lembaga"];
    $tipe = $_POST["tipeKamar"];
    $idKos = $_POST["id_kos"];
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    if (
      empty($name) ||
      empty($asal) ||
      empty($hp) ||
      empty($status) ||
      empty($lembaga) ||
      empty($idKos) ||
      empty($username) ||
      empty($password) ||
      empty($tipe)
    ) {
      header("location: /daftar.php?error=2");
    } else {
      $findUser = "SELECT * FROM anak_kos where username='$username'";
      $dupUser = mysqli_query($conn, $findUser);
      $dupUser = $dupUser->fetch_assoc();
      if (!empty($dupUser)) {
        header("location: daftar.php?error=1");
      } else {
        $tipe = $tipe - 1;

        $insert = "INSERT INTO anak_kos values(
          NULL, '$name', '$asal', '$hp', $idKos, $tipe, 
          '$status', '$lembaga', '$username', '$password'
        );";
        mysqli_query($conn, $insert);

        if (mysqli_error($conn)) {
          header("location: daftar.php?error=" . mysqli_error($conn));
        } else {
          header("location: /login.php");
        }
      }
    }
  }
}
