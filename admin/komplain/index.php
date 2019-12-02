<?php
$dir = $_SERVER["DOCUMENT_ROOT"];
include($dir . "/config/conn.php");
require_once($dir . "/admin/auth.php");
session_start();
$id = $_SESSION["admin"]["id"];
session_abort();

if (isset($_GET["showall"])) {
  $getDataKomplain = "select km.id, ak.nama, km.judul, km.deskripsi, km.tanggal, km.selesai from komplain km
inner join anak_kos ak on km.id_anak_kos = ak.id
inner join kos k on ak.id_kos = k.id
inner join admin a on k.admin_id = a.id
where a.id = $id
order by km.id";
} else {
  $getDataKomplain = "select km.id, ak.nama, km.judul, km.deskripsi, km.tanggal, km.selesai from komplain km
inner join anak_kos ak on km.id_anak_kos = ak.id
inner join kos k on ak.id_kos = k.id
inner join admin a on k.admin_id = a.id
where a.id = $id and km.selesai = 0
order by km.id";
}

$komplains = mysqli_query($conn, $getDataKomplain);
mysqli_close($conn);
?>
<html>

<head>
  <title>
    Kosku - Data Komplain
  </title>
  <?php include($dir . "/templates/resources.php"); ?>
  <style>
    .card-komplain {
      margin-top: 25px;
      margin-bottom: 25px;
    }
  </style>
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
    });
  </script>
</head>

<body>
  <?php include($dir . "/templates/navbar.php"); ?>
  <div class="container" id="data-table">
    <h1>Data Komplain</h1>
    <br /><br />
    <?php
    if (isset($_GET["msg"])) {
      $msg = $_GET["msg"];
      if ($msg == "insert_ok") {
        $msg = "Data Berhasil Disimpan";
      } else if ($msg == "delete_ok") {
        $msg = "Data Berhasil Dihapus";
      } else {
        $msg = "";
      }
    }

    if (!empty($msg)) {
      ?>
      <div class="alert alert-success" id="msgAlert" style="display:none;">
        <?= $msg ?>
      </div>
    <?php } ?>
    <a href="/admin/komplain/create.php" class="btn btn-success"> <i class="fa fa-plus"></i> Tambah Data</a>
    <?php
    while ($komplain = mysqli_fetch_assoc($komplains)) { ?>
      <div class="card card-komplain">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-8">
              <h2><?= $komplain["judul"] ?></h2>
              <p>
                <?= $komplain["deskripsi"] ?>
              </p>
            </div>
            <div class="col-sm-3">
              <h6><?= $komplain["tanggal"] ?></h6>
              <h6><?= $komplain["nama"] ?></h6>
              <button data-toggle="modal" data-id="<?= $komplain["id"] ?>" data-target="#deleteModal" class="btn btn-light deleteData">Tandai Sudah Selesai</button>
            </div>
          </div>
        </div>
      </div>
    <?php
    } ?>

    <a href="/admin/komplain/index.php?showall=y" class="btn btn-warning">Tampilkan Semua Komplain</a>
  </div>
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Selesaikan Komplain</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Apakah anda yakin komplain sudah dilayani?
        </div>
        <div class="modal-footer">
          <form action="/admin/komplain/delete.php" method="post">
            <input type="hidden" name="delete_id" id="delete_id">
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Eh, Ternyata Belum</button>
            <button type="submit" class="btn btn-success" id="hapusAja">Sudah Dong</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>