<html>
  <head>
    <?php 
    $dir = $_SERVER['DOCUMENT_ROOT'];
    include ($dir."/templates/resources.php");
    $msg = "";
    session_start();
    if (isset($_SESSION["error"])) {
      $msg = $_SESSION["error"];
    }
    session_abort();
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
              <h4 class="card-title">Daftar</h4>
              <br />
              <?php 
                if (isset($_SESSION["error"])) {
                ?>
              <div class="alert alert-danger alert-dismissible fade show">
                <?= $msg ?>
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
              <form action="/daftar.php" class="form-group" method="POST">
                <input type="text" name="name" class="form-control" /><br />
                <input type="email" name="email" class="form-control" /><br />
                <input type="password" name="password" class="form-control" />
                <br />
                <input
                  type="submit"
                  name="daftar"
                  value="Daftar"
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
<?php 
if (isset($_POST["daftar"])) {
  include($dir."/config/conn.php");
  
  $name = $_POST["name"];
  $email = $_POST["email"];
  $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

  $insert = "INSERT INTO user values (NULL, '$name', '$email', '$password', NOW(), NOW());";
  $res = mysqli_query($conn, $insert);
  if (mysqli_error($conn)) {
    echo "Error : " . mysqli_error($conn);
  }else{
    header("location: /welcome.php");
  }
}
?>
