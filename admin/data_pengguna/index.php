<?php
$dir = $_SERVER["DOCUMENT_ROOT"];
include($dir . "/config/conn.php");
require_once($dir . "/admin/auth.php");
session_start();
$id = $_SESSION["admin"]["id"];
session_abort();
$getAnakKosData = "select nama, asal, hp, tipe from anak_kos
inner join kos k on anak_kos.id_kos = k.id
inner join admin a on k.admin_id = a.id
where a.id = $id";

$getKosId = "select id from kos where admin_id = $id";
$kosId = mysqli_query($conn, $getKosId)->fetch_assoc();

$res = mysqli_query($conn, $getAnakKosData);


?>
<html>
  <head>
    <title>
      Kosku - Data Pengguna
    </title>
    <?php include($dir . "/templates/resources.php"); ?>
    <style>
      #data-table {
        padding-top: 100px;
      }
    </style>
  </head>

  <body>
    <?php include($dir . "/templates/navbar.php"); ?>
    <div class="container" id="data-table">
      <h1>Data Pengguna</h1><br><br>
      <a href="/admin/data_pengguna/create.php?id=<?= $kosId["id"]?>" class="btn btn-success">Tambah Data</a><br><br>
      <div class="table-responsive">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Nama</th>
            <th scope="col">Asal</th>
            <th scope="col">No. HP</th>
            <th scope="col">Tipe</th>
            <th scope="col">Tindakan</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          while ($users = mysqli_fetch_assoc($res)) {
          ?>
          <tr>
            <td><?= $users["nama"] ?></td>
            <td><?= $users["asal"] ?></td>
            <td><?= $users["hp"] ?></td>
            <td>
              <?php 
              if ($users["tipe"] == "1") {
                echo "Kamar Mandi Dalam";
              }else{
                echo "Kamar Mandi Luar";
              }
              ?>
            </td>
            <td>
              <a href="" class="btn btn-warning">Ubah</a>
              <a href="" class="btn btn-danger">Hapus</a>
            </td>
          </tr>
          <?php }?>
        </tbody>
      </table>
      </div>
    </div>
  </body>
</html>
