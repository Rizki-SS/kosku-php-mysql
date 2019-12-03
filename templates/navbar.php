<?php
$dir = $_SERVER['DOCUMENT_ROOT'];
session_start();
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); margin-bottom: 25px;">
  <div class="container">

    <!-- navbar -->
    <?php

    if (isset($_SESSION["admin"])) {
      ?>
      <a class="navbar-brand" href="/admin/index.php">Kosku</a>
      <!-- navbar toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- kiri -->
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="/admin/data_pengguna">Anak Kos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/pembayaran">Pembayaran</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/komplain">Komplain</a>
          </li>
        </ul>

        <!-- kanan -->
        <div class="dropdown">
          <button class="btn btn-dark dropdown-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?= $_SESSION["admin"]["name"] ?>
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="/admin/settings/admin.php">Akun</a>
            <a class="dropdown-item" href="/admin/settings/kos.php">Kos</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="/logout.php">Logout</a>
          </div>
        </div>
      </div>
    <?php } else if (isset($_SESSION["user"])) { ?>
      <a class="navbar-brand" href="/user/index.php">Kosku</a>
      <!-- navbar toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- kiri -->
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="/user/pembayaran">Pembayaran</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/user/komplain">Komplain</a>
          </li>
        </ul>

        <!-- kanan -->
        <div class="dropdown">
          <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?= $_SESSION["user"]["nama"] ?>
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="/admin/settings/user.php">Akun</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="/logout.php">Logout</a>
          </div>
        </div>
      </div>
    <?php } else { ?>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- kiri -->
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="/admin/data_pengguna">Anak Kos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/pembayaran">Pembayaran</a>
          </li>
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