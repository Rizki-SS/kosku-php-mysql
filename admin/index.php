<?php
$dir = $_SERVER["DOCUMENT_ROOT"];
include($dir . "/admin/auth.php");
session_start();
$admin = $_SESSION["admin"];
session_abort();

$msg = $_GET["msg"];
if ($msg == "user_update_ok") {
  $msg = "Data Anda Berhasil Diubah";
} else if ($msg == "delete_ok") {
  $msg = "Data Berhasil Dihapus";
} else {
  $msg = "";
}
?>

<html>

<head>
  <?php include($dir . "/templates/resources.php") ?>
</head>

<body>
  <?php include($dir . "/templates/navbar.php") ?>
  <div class="container" style="margin-top: 100px;">
    hello, <br>
    <h1><?= $admin["name"] ?></h1>
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