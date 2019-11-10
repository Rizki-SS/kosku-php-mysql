<?php 
session_start();
if(!isset($_SESSION["admin"])){
  header("location: /login.php");
}
session_abort();
?>