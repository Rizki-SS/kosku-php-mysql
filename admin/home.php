<?php
    $dir = $_SERVER["DOCUMENT_ROOT"];
    include($dir . "/config/auth.php");
?>

<html>
  <head>
    <?php include($dir . "/templates/resources.php")?>
  </head>
  <body>
    <?php include($dir . "/templates/navbar.php")?>
  </body>
</html>