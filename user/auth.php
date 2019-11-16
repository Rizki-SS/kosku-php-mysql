<?php
session_start();
if (!isset($_SESSION["user"])) {
  header("location: /welcome.php");
}
session_abort();
