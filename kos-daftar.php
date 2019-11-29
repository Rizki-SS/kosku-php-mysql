
<html>

<head>
  <?php
  $dir = $_SERVER['DOCUMENT_ROOT'];
  include($dir . "/templates/resources.php");
  $msg = "";
  if (isset($_GET["error"])) {
    $error = $_GET["error"];
  } else {
    $error = "";
  }

  if ($error == "1") {
    $msg = "Data sudah ada. Silahkan Login.";
  } else if ($error == "2") {
    $msg = "Data Tidak Valid";
  } else {
    $msg = $error;
  }

  ?>
  <style>
    .login {
      margin: auto;
      padding-left: 100px;
      padding-right: 100px;
    }

    #hiasan {
      background: url("assets/kos-daftar-bg.jpg");
      background-size: cover;
      padding: 50px;
      padding-top: 100px;
    }

    .row {
      height: 100%;
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6" id="hiasan">
        <h2 style="font-weight: bold;">
          Kosku
        </h2>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus
          sapiente vero ratione quisquam atque doloremque autem, reprehenderit
          aliquam voluptates ut ullam praesentium voluptatibus dolorem ex cum
          porro quaerat consequatur nam?
        </p>
        <br /><br />
      </div>
      <div class="col-lg-6 login">
        <h2 class="h2" style="font-weight: bold;">Pendaftaran Kos</h2>
        <br />
        <?php
        if (!empty($msg)) {
          ?>
          <div class="alert alert-danger alert alert-danger alert-dismissible fade show">
            <?= $msg ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php
        }
        ?>
        <form action="/config/kosRegister.php" class="form-group" method="POST">
          <label for="nama">Nama Kos</label>
          <input type="text" name="nama" class="form-control" id="name" placeholder="Nama Kos" /><br />
          <label for="alamat">Alamat Kos</label>
          <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat Kos" /><br />
          <label for="jumlahKamar">Jumlah Kamar</label>
          <input type="text" name="jumlahkamar" class="form-control" id="jumlahKamar" placeholder="Jumlah Kamar" /><br />
          <label for="kamarMandiLuar">Harga Kamar Mandi Luar</label>
          <input type="text" name="kamarMandiLuar" class="form-control" id="kamarMandiLuar" placeholder="Harga Kamar Mandi Luar" /><br />
          <label for="kamarMandiDalam">Harga Kamar Mandi Dalam</label>
          <input type="text" name="kamarMandiDalam" class="form-control" id="kamarMandiDalam" placeholder="Harga Kamar Mandi Dalam" /><br />
          <input type="hidden" name="id" value="<?= $_GET['id'] ?>" />
          <br />
          <input type="submit" name="daftar" value="Daftar" class="btn btn-dark" />
        </form>
      </div>
    </div>
  </div>
</body>

</html>