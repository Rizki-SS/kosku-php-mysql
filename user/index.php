<?php
$dir = $_SERVER["DOCUMENT_ROOT"];
include($dir . "/user/auth.php");
include($dir . "/config/conn.php");
session_start();
$user = $_SESSION["user"];
session_abort();

if (isset($_GET["msg"])) {
  $msg = $_GET["msg"];

  if ($msg == "user_update_ok") {
    $msg = "Data Anda Berhasil Diubah";
  } else if ($msg == "delete_ok") {
    $msg = "Data Berhasil Dihapus";
  } else {
    $msg = "";
  }
}

?>

<html>

<head>
  <?php include($dir . "/templates/resources.php") ?>
  <title>Kosku - Home</title>
</head>

<body>
  <?php include($dir . "/templates/navbar.php") ?>
  <div class="container">
    hello, <br />
    <h1><b><?= $user["nama"] ?></b></h1>
    <br>
    <?php
    if (!empty($msg)) {
      ?>
      <div class="alert alert-success" id="msgAlert" style="display:none;">
        <?= $msg ?>
      </div>
    <?php
    }
    ?>
  </div>
</body>

</html>