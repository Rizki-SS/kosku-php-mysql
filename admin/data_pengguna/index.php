<?php
$dir = $_SERVER["DOCUMENT_ROOT"];
include($dir . "/config/conn.php");
require_once($dir . "/admin/auth.php");
session_start();
$id = $_SESSION["admin"]["id"];
session_abort();
$getAnakKosData = "select no_kamar, nama, asal, hp from kamar k 
left join anak_kos ak on k.id_kamar = ak.id_kamar 
inner join kos k2 on k.id_kos = k2.id where admin_id = $id;";

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
      <a href="" class="btn btn-success">Tambah Data</a><br><br>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">No. Kamar</th>
            <th scope="col">Nama</th>
            <th scope="col">Asal</th>
            <th scope="col">No. HP</th>
            <th scope="col">Tindakan</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          while ($users = mysqli_fetch_assoc($res)) {
          ?>
          <tr>
            <td><?= $users["no_kamar"]?></td>
            <td><?= $users["nama"] ?></td>
            <td><?= $users["asal"] ?></td>
            <td><?= $users["hp"] ?></td>
            <td>
              <a href="" class="btn btn-warning">Ubah</a>
              <a href="" class="btn btn-danger">Hapus</a>
            </td>
          </tr>
          <?php }?>
        </tbody>
      </table>
      

    </div>
  </body>
</html>
