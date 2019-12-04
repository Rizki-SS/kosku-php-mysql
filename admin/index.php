<?php
$dir = $_SERVER["DOCUMENT_ROOT"];
include($dir . "/admin/auth.php");
include($dir . "/config/conn.php");
session_start();
$admin = $_SESSION["admin"];
session_abort();

if (isset($_GET["msg"])) {
  $msg = $_GET["msg"];
  if ($msg == "user_update_ok") {
    $msg = "Data Anda Berhasil Diubah";
  } else if ($msg == "delete_ok") {
    $msg = "Data Berhasil Dihapus";
  } else {
    $msg = "";
  }
}
?>

<html>

<head>
  <?php include($dir . "/templates/resources.php"); ?>
  <title>Kosku - Home</title>
  <style>
    .card{
      margin-top: 8px;
      margin-bottom: 8px;
    }
  </style>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <?php
    $getKelompokAsal = "select ak.asal, count(ak.id) as jumlah from anak_kos ak
    inner join kos k on ak.id_kos = k.id
    inner join admin a on k.admin_id = a.id
    where a.id = $admin[id]
    group by asal";

    $res = mysqli_query($conn, $getKelompokAsal);
  ?>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Asal', 'Jumlah Kota'],
          <?php 
          while($row = mysqli_fetch_assoc($res)){ ?>
            ['<?= $row["asal"]?>', <?= $row["jumlah"]?>],
          <?php }
          ?>
        ]);

        var options = {
          title: 'Data Jumlah Anak Kos Berdasarkan Kota',
          pieHole: 0.4
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

</head>

<body>
  <?php include($dir . "/templates/navbar.php") ?>
  <div class="container">
    hello, <br />
    <h1><b><?= $admin["name"] ?></b></h1>
    <br>
    <?php
    if (!empty($msg)) {
      ?>
      <div class="alert alert-success" id="msgAlert" style="display:none;">
        <?= $msg ?>
      </div>
    <?php
    }
    ?>

    <div class="row">
      <div class="col-lg-4">
        <div class="card">
          <div class="card-body">
            <?php
            $count = "select count(*) as inserted from anak_kos ak
                  inner join kos k on ak.id_kos = k.id
                  inner join admin a on k.admin_id = a.id
                  where a.id=$admin[id];";
            $countOutput = mysqli_query($conn, $count);
            $inserted = $countOutput->fetch_assoc();
            $inserted = (int) $inserted["inserted"];

            //2. Mengambil data jumlah kamar pada tabel kos
            $max = "select kos_user from kos k
            inner join admin a on k.admin_id = a.id
            where a.id = $admin[id]";
            $MaxOutput = mysqli_query($conn, $max);
            $MaxOutput = mysqli_fetch_assoc($MaxOutput);
            $max = (int) $MaxOutput["kos_user"];
            ?>
            <span>Jumlah Anak Kos</span>
            <h1><b><?= $inserted ?></b> <small> / <?= $max ?></small></h1>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <?php
        $getDataPembayaran = "select count(*) as done from anak_kos ak
        inner join pembayaran p on ak.id = p.id_anak_kos
        inner join kos k on ak.id_kos = k.id
        inner join admin a on k.admin_id = a.id
        where a.id = $admin[id] and p.bulan = MONTH(NOW()) and p.tahun = YEAR(NOW())";

        $data = mysqli_query($conn, $getDataPembayaran)->fetch_assoc();
        ?>
        <div class="card">
          <div class="card-body">
            <span>Terbayar Bulan Ini</span>
            <h1><b><?= $data["done"] ?></b> <small> / <?= $inserted ?></small></h1>
          </div>
        </div>
      </div>

      <?php 
      $getJumlahKomplain = "select count(*) as jumlahkomplain
      from komplain km
      inner join anak_kos ak on km.id_anak_kos = ak.id
      inner join kos k on ak.id_kos = k.id
      inner join admin a on k.admin_id = a.id
      where a.id = $admin[id] and km.selesai = 0";

      $res = mysqli_query($conn, $getJumlahKomplain)->fetch_assoc();
      ?>
      <div class="col-lg-4">
        <div class="card">
          <div class="card-body">
            <span>Komplain yang belum diselesaikan</span>
            <h1><b><?= $res["jumlahkomplain"]?></b></h1>
          </div>
        </div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-sm-6">
        <div id="piechart" style="width: 100%; height: 300px;"></div>
      </div>
    </div>
  </div>
</body>

</html>

<?php 
mysqli_close($conn);
?>