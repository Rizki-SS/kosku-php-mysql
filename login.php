<html>
  <head>
    <title>Kosku - Login</title>
    <?php 
    $dir = $_SERVER['DOCUMENT_ROOT'];
    include ($dir."/templates/resources.php");
    
    if (isset($_GET["error"])) {
      $error = $_GET["error"];
    }else{
      $error = "";
    }

    $pesan = "";
    if ($error == 1) {
      $pesan = "Username Invalid";
    }else if ($error == 2) {
      $pesan = "Password Invalid";
    }
    ?>
    <style>
      #login {
        margin-top: 100px;
      }
    </style>
  </head>
  <body class="bg-dark">
    <?php include ($dir."/templates/navbar.php");?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-4 offset-4">
          <div class="card text-center" id="login">
            <div class="card-body">
              <h4 class="card-title">Login</h4>
              <br />
                <?php 
                if (!empty($pesan)) {
                ?>
              <div class="alert alert-danger alert alert-danger alert-dismissible fade show">
                <?= $pesan ?>
                <button
                  type="button"
                  class="close"
                  data-dismiss="alert"
                  aria-label="Close"
                >
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <?php 
                }
                ?>
              <form action="/config/check.php" class="form-group" method="POST">
                <input type="email" name="email" class="form-control" /><br />
                <input type="password" name="password" class="form-control" />
                <br />
                <input
                  type="submit"
                  name="submit"
                  value="submit"
                  class="btn btn-dark"
                />
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
