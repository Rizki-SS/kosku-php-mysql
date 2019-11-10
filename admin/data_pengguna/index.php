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
$users = $res->fetch_assoc();

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
      <h1>Data Pengguna</h1>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">No. Kamar</th>
            <th scope="col">Nama</th>
            <th scope="col">Asal</th>
            <th scope="col">No. HP</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          foreach ($users as $user => $key) {
          ?>
          <tr>
            <td><?= $key["no_kamar"]?></td>
            <td><?= $key["nama"] ?></td>
            <td><?= $key["asal"] ?></td>
            <td><?= $key["hp"] ?></td>
          </tr>
          <?php }?>
        </tbody>
      </table>
    </div>
  </body>
</html>
