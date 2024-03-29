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
    $msg = "Ada isian yang kosong. Coba cek data anda.";
  } else if ($error == "1452") {
    $msg = "Kos Tidak Ada";
  } else {
    $msg = $error;
  }

  ?>
  <style>
    #hiasan {
      background: url("assets/kos-daftar-bg.jpg");
      background-size: cover;
      padding: 50px;
      padding-top: 100px;
    }

    #content {
      height: 100%;
    }

    .login {
      padding-top: 50px;
    }

    .nav-item{
      width: 50%;
      text-align: center;
    }
  </style>
  <title>
    Kosku - Daftar
  </title>
  <script>
    $(document).ready(function() {
      $("#tabs-2").hide();
      $("#tabs-1").show();

      $("#pemilikKos").click(function() {
        $("#tabs-2").hide();
        $("#tabs-1").show();
        $(this).addClass("active");
        $("#anakKos").removeClass("active");
      });
      $("#anakKos").click(function() {
        $("#tabs-1").hide();
        $("#tabs-2").show();
        $(this).addClass("active");
        $("#pemilikKos").removeClass("active");
      });
    });
  </script>
</head>

<body>
  <div class="container-fluid">
    <div class="row" id="content">
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
        <span>Sudah punya akun?</span><br />
        <a href="/login.php" class="btn btn-dark">Login</a>
      </div>
      <div class="col-lg-6 login">

        <h2 class="h2" style="font-weight: bold;">Daftar</h2>
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
        <div class="text-center">
          
        </div>
        <div class="row" >
          <div class="offset-sm-1 col-sm-10" >
          <ul class="nav nav-tabs bg-primary justify-content-center" style="width: 100%">
            <li class="nav-item">
              <a class="nav-link active" id="pemilikKos">Daftar sebagai Pemilik Kos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="anakKos">Daftar Sebagai Anak Kos</a>
            </li>
          </ul>
            <form action="/config/register.php" method="POST" id="tabs-1" style="display:none">
              <div>
                <div class="form-group">
                  <label for="#admin_name">Nama</label>
                  <input type="text" name="name" class="form-control" id="admin_name" placeholder="Nama" />
                </div>
                <div class="form-group">
                  <label for="#admin_username">Username</label>
                  <input type="text" name="username" class="form-control" id="admin_username" placeholder="Username" />
                </div>
                <div class="form-group">
                  <label for="#admin_password">Password</label>
                  <input type="password" name="password" class="form-control" id="admin_password" placeholder="Password" />
                </div>
              </div>
              <input type="hidden" name="tipeUser" id="admin" value="pemilikKos">
              <input type="submit" name="daftar" value="Daftar" class="btn btn-dark" id="submitAdmin" />
            </form>
            <form action="/config/register.php" method="POST" id="tabs-2" style="display:none">
              <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Nama" />
              </div>
              <div class="form-group">
                <label for="asal">Asal</label>
                <input type="text" name="asal" class="form-control" id="asal" placeholder="Asal" />
              </div>
              <div class="form-group">
                <label for="hp">No. HP</label>
                <input type="text" name="hp" class="form-control" id="hp" placeholder="No. HP" />
              </div>
              <div class="form-group">
                <label for="status">Status (Kuliah / Kerja)</label>
                <input type="text" name="status" class="form-control" id="status" placeholder="Status" />
              </div>
              <div class="form-group">
                <label for="lembaga">Lembaga</label>
                <input type="text" name="lembaga" class="form-control" id="lembaga" placeholder="Lembaga" />
              </div><br>
              <div class="form-group">
                <label for="id_kos">ID Kos (Dapatkan dari Pemilik Kos)</label>
                <input type="text" name="id_kos" class="form-control" id="id_kos" placeholder="ID Kos" />
              </div>
              <div class="form-group">
                <label for="tipekos">Tipe Kos</label>
                <select class="custom-select  " id="inlineFormCustomSelect" name="tipeKamar">
                  <option selected value="">Pilih</option>
                  <option value="1">Kamar Mandi Luar</option>
                  <option value="2">Kamar Mandi Dalam</option>
                </select>
              </div><br>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="username" />
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="password" />
              </div>
              <input type="hidden" name="tipeUser" id="user" value="anakKos"> <br>
              <input type="submit" name="daftar" value="Daftar" class="btn btn-dark" id="submitUser" />
          </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</body>



</html>