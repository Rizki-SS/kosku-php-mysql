<?php 
$dir = $_SERVER['DOCUMENT_ROOT'];
?>

<nav class="navbar navbar-expand-lg navbar-light bg-warning">
      <a class="navbar-brand" href="#">Navbar</a>
      <!-- navbar toggler -->
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>


      <!-- navbar -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- kiri -->
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href=""
              >Pengguna</a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pembayaran</a>
          </li>
        </ul>

        <!-- kanan -->
        <form class="form-inline my-2 my-lg-0">
          <button class="btn btn-danger" type="submit">
            Log Out
          </button>
        </form>
      </div>
    </nav>