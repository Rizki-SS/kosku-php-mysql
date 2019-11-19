<?php
$dir = $_SERVER["DOCUMENT_ROOT"];
include($dir . "/config/conn.php");
require_once($dir . "/admin/auth.php");
session_start();
$id = $_SESSION["admin"]["id"];
session_abort();
if (isset($_GET["bulan"]) && isset($_GET["tahun"])) {
  $bulan = $_GET["bulan"];
  $tahun = $_GET["tahun"];
  $getDataPembayaran = "select p.id, ak.id as id_anak_kos, nama, tipe, case
  when tipe = 0
    then k.harga_kamar_mandi_dalam
    else k.harga_kamar_mandi_luar
  end as tagihan,
  tgl_transaksi 
  from anak_kos ak
  left join (
    select id, id_anak_kos, tgl_transaksi, bulan, tahun 
    from pembayaran 
    where bulan = $bulan 
    and tahun = $tahun) as p
  on ak.id = p.id_anak_kos
  inner join kos k on ak.id_kos = k.id
  inner join admin a on k.admin_id = a.id
  where a.id = $id";
} else {
  $getDataPembayaran = "select p.id, ak.id as id_anak_kos, nama, tipe,
  case
  when tipe = 0
  then k.harga_kamar_mandi_dalam
  else k.harga_kamar_mandi_luar
end as tagihan,
tgl_transaksi from anak_kos ak
  left join (
      select id, id_anak_kos, tgl_transaksi 
      from pembayaran 
      where bulan = MONTH(NOW()) 
        and tahun = YEAR(NOW())) as p
  on ak.id = p.id_anak_kos
  inner join kos k on ak.id_kos = k.id
  inner join admin a on k.admin_id = a.id
  where a.id = $id";
}
$res = mysqli_query($conn, $getDataPembayaran);

$getKosId = "select id from kos where admin_id = $id";
$kosId = mysqli_query($conn, $getKosId)->fetch_assoc();

if (isset($_GET["msg"])) {
  $msg = $_GET["msg"];
  if ($msg == "insert_ok") {
    $msg = "Data Berhasil Disimpan";
  }
}

?>
<html>

<head>
  <title>
    Kosku - Data Pengguna
  </title>
  <?php include($dir . "/templates/resources.php"); ?>
  <script>
    $(document).ready(function() {
      $("#msgAlert").slideDown();
      $("#msgAlert").delay(3000);
      $("#msgAlert").slideUp();
    });
  </script>
</head>

<body>
  <?php include($dir . "/templates/navbar.php"); ?>
  <div class="container" id="data-table">
    <h1>Data Pembayaran</h1><br><br>
    <?php
    if (!empty($msg)) {
      ?>
      <div class="alert alert-success" id="msgAlert" style="display:none;">
        <?= $msg ?>
      </div>
    <?php
    }
    ?>
    <form action="/admin/pembayaran/index.php" method="get" class="float-right form-inline">
      <div class="mb-2 mx-sm-3">
        Filter :
      </div>
      <div class="form-group mb-2">
        <select name="bulan" id="bulan" class="custom-select">
          <option value="">Pilih</option>
          <option value="1">Januari</option>
          <option value="2">Februari</option>
          <option value="3">Maret</option>
          <option value="4">April</option>
          <option value="5">Mei</option>
          <option value="6">Juni</option>
          <option value="7">Juli</option>
          <option value="8">Agustus</option>
          <option value="9">September</option>
          <option value="10">Oktober</option>
          <option value="11">November</option>
          <option value="12">Desember</option>
        </select>
      </div>
      <div class="form-group mx-sm-3 mb-2">
        <input type="text" name="tahun" placeholder="Tahun" class="form-control">
      </div>
      <div class="form-group mb-2">
        <input type="submit" value="Go" name="submit" class="btn btn-secondary">
      </div>
    </form>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Nama</th>
          <th scope="col">Tipe</th>
          <th scope="col">Tagihan</th>
          <th scope="col">Status Pembayaran</th>
          <th scope="col">Tindakan</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($users = mysqli_fetch_assoc($res)) {
          ?>
          <tr>
            <td><?= $users["nama"] ?></td>
            <td>
              <?php
                if ($users["tipe"] == "1") {
                  echo "Kamar Mandi Dalam";
                } else {
                  echo "Kamar Mandi Luar";
                }
                ?>
            </td>
            <td><?= $users["tagihan"] ?></td>
            <td>
              <?php
                if (empty($users["tgl_transaksi"])) {
                  echo "Belum Membayar";
                } else {
                  echo "Sudah membayar pada Tanggal " . date_format(date_create($users["tgl_transaksi"]), "d/m/Y");
                }
                ?>
            </td>
            <td>
              <?php
                if (empty($users["tgl_transaksi"])) { ?>
                <a href="/admin/pembayaran/create.php?id=<?= $users["id_anak_kos"] ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data</a>
              <?php } else { ?>
                <a href="/admin/pembayaran/edit.php?id=<?= $users["id"] ?>" class="btn btn-light"><i class="fa fa-edit"></i> Ubah Data</a>
              <?php } ?>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</body>

</html>