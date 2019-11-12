<?php
$dir = $_SERVER["DOCUMENT_ROOT"];
include($dir . "/config/conn.php");
require_once($dir . "/admin/auth.php");
session_start();
$id = $_SESSION["admin"]["id"];
session_abort();
$getAnakKosData = "select ak.id, ak.nama, ak.asal, ak.hp, ak.tipe from anak_kos ak
inner join kos k on ak.id_kos = k.id
inner join admin a on k.admin_id = a.id
where a.id = $id";

$getKosId = "select id from kos where admin_id = $id";
$kosId = mysqli_query($conn, $getKosId)->fetch_assoc();

$res = mysqli_query($conn, $getAnakKosData);

$msg = $_GET["msg"];
if ($msg == "insert_ok") {
  $msg = "Data Berhasil Disimpan";
} else if ($msg == "delete_ok") {
  $msg = "Data Berhasil Dihapus";
} else {
  $msg = "";
}

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
    <a href="/admin/data_pengguna/create.php?id=<?= $kosId["id"] ?>" class="btn btn-success">Tambah Data</a><br><br>
    <?php
    if (!empty($msg)) {
      ?>
      <div class="alert alert-success" id="msgAlert" style="display:none;">
        <?= $msg ?>
      </div>
    <?php
    }
    ?>
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
                  } else {
                    echo "Kamar Mandi Luar";
                  }
                  ?>
              </td>
              <td>
                <a href="/admin/data_pengguna/edit.php?id=<?= $users["id"] ?>" class="btn btn-warning">
                  Ubah</a>
                <button data-id="<?= $users["id"] ?>" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger deleteData">
                  Hapus
                </button>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Apakah anda yakin menghapus data ini?
        </div>
        <div class="modal-footer">
          <form action="/admin/data_pengguna/delete.php" method="get">
            <input type="text" name="delete_id" id="delete_id">
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Ga Jadi Deh..</button>
            <button type="submit" class="btn btn-danger" id="hapusAja">Hapus</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
<script>
  $(document).ready(function() {
    $("#msgAlert").slideDown();
    $("#msgAlert").delay(3000);
    $("#msgAlert").slideUp();

    $('.deleteData').click(function() {
      var ID = $(this).data('id');
      console.log(ID);
      $('#hapusAja').data('id', ID);
      $("#delete_id").val(ID);
    });

    $('#hapusAja').click(function() {
      var ID = $(this).data('id');
      $("#delete_id").val(ID);
    });
  });
</script>

</html>