<html>

<head>
  <title>Kosku - Login</title>
  <?php
  $dir = $_SERVER['DOCUMENT_ROOT'];
  include($dir . "/templates/resources.php");

  if (isset($_GET["error"])) {
    $error = $_GET["error"];
  } else {
    $error = "";
  }

  $pesan = "";
  if ($error == 1) {
    $pesan = "Username Invalid";
  } else if ($error == 2) {
    $pesan = "Password Invalid";
  }
  ?>
  <style>
    .login {
      margin: auto;
      padding-left: 100px;
      padding-right: 100px;
    }

    #hiasan {
      background: url("assets/login-bg.jpg");
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
        <span>Belum punya akun?</span><br />
        <a href="/daftar.php" class="btn btn-dark">Daftar</a>
      </div>
      <div class="col-lg-6 login">
        <?php
        if (!empty($pesan)) {
          ?>
          <div class="alert alert-danger alert alert-danger alert-dismissible fade show">
            <?= $pesan ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php
        }
        ?>
        <h2 class="h2" style="font-weight: bold;">Login</h2>
        <br /><br />
        <form action="/config/check.php" class="form-group" method="POST">
          <label for="username">Email</label>
          <input type="name" name="username" class="form-control" id="username" /><br />
          <label for="password">Password</label>
          <input type="password" name="password" class="form-control" id="password" />
          <br />
          <input type="submit" name="submit" value="Login" class="btn btn-dark" />
        </form>
      </div>
    </div>
  </div>
</body>

</html>