<?php
$dir = $_SERVER['DOCUMENT_ROOT'];
session_start();
?>

<nav class="navbar navbar-expand-lg navbar-light bg-warning fixed-top" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2)">
  <div class="container">
    <a class="navbar-brand" href="/admin/index.php">Kosku</a>
    <!-- navbar toggler -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- navbar -->
    <?php

    if (isset($_SESSION["admin"])) {
      ?>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- kiri -->
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="/admin/data_pengguna">Pengguna</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pembayaran</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Komplain</a>
          </li>
        </ul>

        <!-- kanan -->
        <div class="dropdown">
          <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Irfan Rafif
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Profile</a>
            <a class="dropdown-item" href="#">Settings</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="/logout.php">Logout</a>
          </div>
        </div>
      </div>
    <?php
    } else {
      ?>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- kiri -->
        <ul class="navbar-nav mr-auto">
        </ul>

        <!-- kanan -->
        <div>
          <a href="/daftar.php" class="btn btn-outline-dark">
            Daftar
          </a>
          <a href="/login.php" class="btn btn-dark">
            Login
          </a>
        </div>

      </div>
    <?php }
    session_abort();
    ?>
  </div>
</nav>