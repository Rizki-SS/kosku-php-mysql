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
              <form action="/ver.php" class="form-group" method="POST">
                <input
                  type="email"
                  name="email"
                  class="form-control"
                /><br />
                <input type="password" name="password" class="form-control" />
                <br />
                <input type="submit" value="submit" class="btn btn-dark" />
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>