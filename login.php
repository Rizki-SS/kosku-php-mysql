<html>
  <head>
    <?php 
    $dir = $_SERVER['DOCUMENT_ROOT'];
    include ($dir."/templates/resources.php");
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
              <h5 class="card-title">Login</h5>
              <br />
              <form action="login.php" class="form-group" method="POST">
                <input
                  type="email"
                  name="email"
                  class="form-control"
                /><br />
                <input type="password" name="password" class="form-control" />
                <br />
                <input type="submit" name="submit" value="submit" class="btn btn-dark" />
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
<?php 
if(isset($_POST["submit"])){
  $dir = $_SERVER['DOCUMENT_ROOT'];
  include($dir.'/conn.php');

  $email = $_POST["email"];
  $password = $_POST["password"];
  // echo $email;
  $query = 'SELECT * FROM user WHERE email="'.$email.'";';
  $res = mysqli_query($conn, $query);
  $data = mysqli_fetch_assoc($res);

  if ($data["email"] == $email) {
    if (password_verify($password, $data["password"])) {
      session_start();
      $_SESSION["user"] = $data;
      header("location: /welcome.php");
    }
  }
}
?>