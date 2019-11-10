<?php
    $dir = $_SERVER["DOCUMENT_ROOT"];
    include($dir . "/admin/auth.php");
    session_start();
    $admin = $_SESSION["admin"];
    session_abort();
?>

<html>
  <head>
    <?php include($dir . "/templates/resources.php")?>
  </head>
  <body>
    <?php include($dir . "/templates/navbar.php")?>
    <div class="container" style="margin-top: 100px;">
    hello, <br>
    <h1><?= $admin["name"] ?></h1>
    </div>
  </body>
</html>