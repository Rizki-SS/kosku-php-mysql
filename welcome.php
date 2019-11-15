<html>

<head>
  <title>Kosku - Welcome Page</title>
  <style>
    #header {
      height: 500px;
      background-image: url("assets/head-bg.jpg");
      background-attachment: fixed;
      background-size: cover;
      padding-top: 200px;
    }

    .benefit {
      padding-top: 50px;
      padding-bottom: 50px;
    }

    .img-benefit {
      width: 500px;
      height: auto;
    }

    .circle {
      margin: auto;
      margin-top: 25px;
      width: 200px;
      height: 200px;
      border: 10px solid #ffbe15;
      border-radius: 50%;
    }

    .number {
      margin-top: 20px;
      font-size: 72pt;
      text-align: center;
    }

    #fitur {
      background: url("assets/fitur-bg.jpg");
      background-attachment: fixed;
      background-size: cover;
    }

    .card.fitur {
      height: 450px;
      margin-bottom: 25px;
    }
  </style>
  <?php
  include("templates/resources.php")
  ?>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-warning sticky-top" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
    <div class="container">
      <a class="navbar-brand" href="/admin/index.php">Kosku</a>
      <!-- navbar toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- navbar -->
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
    </div>
  </nav>

  <div class="container-fluid" id="header">
    <div class="offset-2 col-8">
      <h1 class="display-4 text-light text-center">
        Manajemen Kos Dalam 1 Aplikasi
      </h1>
      <h6 class="text-light text-center">
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatem
        distinctio pariatur perferendis delectus dolore dolores quae quos non
        corporis libero eligendi nobis, atque totam. Officia voluptate nam
        maiores sint maxime.
      </h6>
    </div>
  </div>
  <div class="container benefit">
    <div class="row">
      <div class="col-lg">
        <img src="assets/undraw_file_manager_j85s.svg" class="img-benefit" />
      </div>
      <div class="col-lg">
        <h3 style="font-weight: 500;">
          Butuh data anak kos tapi ga bawa bukunya?
        </h3>
        <br />
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe
          incidunt, tempora quasi dignissimos ullam adipisci possimus sunt
          natus dolores aperiam consequatur ratione quam praesentium culpa,
          sint perferendis officiis eum omnis!
        </p>
      </div>
    </div>
  </div>
  <div class="container benefit">
    <div class="row">
      <div class="col-lg">
        <h3 style="font-weight: 500;">Lupa ga bawa buku data pembayaran?</h3>
        <br />
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe
          incidunt, tempora quasi dignissimos ullam adipisci possimus sunt
          natus dolores aperiam consequatur ratione quam praesentium culpa,
          sint perferendis officiis eum omnis!
        </p>
      </div>
      <div class="col-lg">
        <img src="assets/undraw_data_report_bi6l.svg" class="img-benefit float-right" />
      </div>
    </div>
  </div>
  <div class="container-fluid benefit" id="fitur">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-sm">
          <div class="card fitur">
            <div class="circle">
              <div class="number">1</div>
            </div>
            <div class="card-body">
              <h5 class="card-title">Manajemen Data Anak Kos</h5>
              <p class="card-text">
                Dengan aplikasi ini, kamu bisa dengan cepat melihat, mengubah
                dan menghapus data pengguna kosmu sehingga tak perlu repot
                lagi membawa buku tabalmu
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card fitur">
            <div class="circle">
              <div class="number">2</div>
            </div>
            <div class="card-body">
              <h5 class="card-title">Manajemen Pembayaran Anak Kos</h5>
              <p class="card-text">
                Dengan aplikasi ini, kamu dapat dengan mudah mengetahui,
                mencatat, dan mengubah data pembayaran pengguna kosmu.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card fitur">
            <div class="circle">
              <div class="number">3</div>
            </div>
            <div class="card-body">
              <h5 class="card-title">Pantau Penghasilanmu</h5>
              <p class="card-text">
                Dengan aplikasi ini, kamu dapat dengan mudah mengetahui data
                pemasukan yang kamu dapat dengan usaha kosmu. Tidak perlu
                repot, hanya sekali klik.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container benefit text-center">
    <h2>Tertarik? Daftar Dulu Aja...</h2>
    <p>Pasti nyaman kok. Coba aja deh. Ga nyesel kok pake ini.</p>
    <a href="#" class="btn btn-dark">Daftar</a>
  </div>
</body>

</html>