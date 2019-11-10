<html>

<head>
  <?php
  $dir = $_SERVER['DOCUMENT_ROOT'];
  include($dir . "/templates/resources.php");
  $msg = "";
  if (isset($_GET["error"])) {
    $error = $_GET["error"];
  } else {
    $error = "";
  }

  if ($error == "1") {
    $msg = "Data sudah ada. Silahkan Login.";
  } else if ($error == "2") {
    $msg = "Data Tidak Valid";
  } else {
    $msg = $error;
  }

  ?>
  <style>
    .login {
      width: 200px;
      margin: auto;
      padding-left: 100px;
      padding-right: 100px;
    }

    #hiasan {
      background: url("assets/kos-daftar-bg.jpg");
      background-size: cover;
      padding: 50px;
      padding-top: 100px;
    }

    .row {
      height: 100%;
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6" id="hiasan">
        <h2 style="font-weight: bold;">
          Kosku
        </h2>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus
          sapiente vero ratione quisquam atque doloremque autem, reprehenderit
          aliquam voluptates ut ullam praesentium voluptatibus dolorem ex cum
          porro quaerat consequatur nam?
        </p>
        <br /><br />
        <span>Sudah punya akun?</span><br />
        <a href="/login.php" class="btn btn-dark">Login</a>
      </div>
      <div class="col-lg-6 login">

        <h2 class="h2" style="font-weight: bold;">Daftar</h2>
        <br />
        <?php
        if (!empty($msg)) {
          ?>
          <div class="alert alert-danger alert alert-danger alert-dismissible fade show">
            <?= $msg ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php
        }
        ?>
        <form action="/daftar.php" class="form-group" method="POST">
          <label for="name">Nama</label>
          <input type="text" name="name" class="form-control" id="name" placeholder="Nama" /><br />
          <label for="username">Username</label>
          <input type="text" name="username" class="form-control" id="username" placeholder="Username" /><br />
          <label for="email">Email</label>
          <input type="email" name="email" class="form-control" id="email" placeholder="Email" /><br />
          <label for="password">Password</label>
          <input type="password" name="password" class="form-control" id="password" placeholder="Password" />
          <br />
          <input type="submit" name="daftar" value="Daftar" class="btn btn-dark" />
        </form>
      </div>
    </div>
  </div>
</body>

</html>
<?php
if (isset($_POST["daftar"])) {
  include($dir . "/config/conn.php");

  $name = $_POST["name"];
  $email = $_POST["email"];
  $username = $_POST["username"];
  $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

  if (empty($name) || empty($email) || empty($password) || empty($username)) {
    header("location: daftar.php?error=2");
  } else {
    $findEmail = "SELECT * FROM admin WHERE email='$email';";
    $res = mysqli_query($conn, $findEmail);
    $data = mysqli_fetch_assoc($res);

    if (!empty($data)) {
      header("location: daftar.php?error=1");
    } else {
      $insert = "INSERT INTO admin values (NULL, '$name','$username', '$email', '$password', NOW(), NOW());";
      $res = mysqli_query($conn, $insert);
      if (mysqli_error($conn)) {
        $error = mysqli_error($conn);
        header("location: daftar.php?error=$error");
      } else {
        $findId = "SELECT id FROM admin where email='$email'";
        $id = mysqli_fetch_assoc(mysqli_query($conn, $findId));
        header("location: /kos-daftar.php?id=$id[id]");
      }
    }
  }
}
?>