<?php
$dir = $_SERVER["DOCUMENT_ROOT"];
include($dir . "/admin/auth.php");
include($dir . "/config/conn.php");
session_start();
$admin = $_SESSION["admin"];
session_abort();

if (isset($_POST["submit"])) {
  $id = $_POST["id"];
  $name = $_POST["nama"];
  $username = $_POST["username"];
  $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

  $updateAdmin = "UPDATE admin set name='$name', username='$username', password='$password' where id=$id";
  mysqli_query($conn, $updateAdmin);

  if (mysqli_error($conn)) {
    echo mysqli_error($conn);
  } else {
    header("location: /admin/index.php?msg=user_update_ok");
  }
}
?>

<html>

<head>
  <?php include($dir . "/templates/resources.php") ?>
</head>

<body>
  <?php include($dir . "/templates/navbar.php") ?>
  <div class="container" style="margin-top: 100px;">
    <h1>Pengaturan Akun</h1>

    <form action="/admin/settings/admin.php" method="post">
      <div class="row">
        <div class="col-lg-6">
          <label for="id">ID</label><br />
          <input type="text" name="id" id="id" class="form-control" value="<?= $admin["id"] ?>" readonly /><br />
          <label for="nama">Nama</label><br />
          <input type="text" name="nama" id="nama" class="form-control" value="<?= $admin["name"] ?>" /><br />
        </div>
        <div class="col-lg-6">
          <label for="username">Username</label><br />
          <input type="text" name="username" id="username" class="form-control" value="<?= $admin["username"] ?>" /><br />
          <label for="password">Password</label><br />
          <input type="password" name="password" id="password" class="form-control" /><br />
        </div>
      </div>
      <input type="submit" value="Simpan" name="submit" class="btn btn-success" />
      <a href="/admin/data_pengguna/index.php" class="btn btn-secondary">Batal</a>
    </form>
  </div>


</body>

</html>