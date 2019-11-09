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
      width: 200px;
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
        <form action="/kos-daftar.php" class="form-group" method="POST">
          <label for="nama">Nama Kos</label>
          <input type="text" name="nama" class="form-control" id="name" placeholder="Nama Kos" /><br />
          <label for="alamat">Alamat Kos</label>
          <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat Kos" /><br />
          <label for="jumlahKamar">Jumlah Kamar</label>
          <input type="text" name="jumlahkamar" class="form-control" id="jumlahKamar" placeholder="Jumlah Kamar" />
          <input type="text" name="id" value="<?php echo $_GET['id']; ?>" style="display: none;">
          <br />
          <input type="submit" name="daftar" value="Daftar" class="btn btn-dark" />
        </form>
      </div>
    </div>
  </div>
</body>

</html>
<?php
if (isset($_POST["daftar"])) {
  include($dir . "/config/conn.php");

  $nama = $_POST["nama"];
  $alamat = $_POST["alamat"];
  $jumlahKamar = $_POST["jumlahkamar"];
  $id = $_POST["id"];

  if (empty($nama) || empty($alamat) || empty($jumlahKamar) || empty($id)) {
    header("location: /kos-daftar.php?error=2");
  } else {
    $insert = "INSERT INTO kos values (NULL, '$nama', '$alamat', $jumlahKamar, $id, NOW(), NOW());";
    mysqli_query($conn, $insert);
    if (mysqli_error($conn)) {
      $error = $error . mysqli_error($conn);
      header("location: /kos-daftar.php?error=$error&id=$id");
    } else {
      header("location: /login.php");
    }
  }
}
?>