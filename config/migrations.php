<?php
$db_host = "mysql-6367-0.cloudclusters.net";
$db_username = "mirfanrafif";
$db_password = "irfanRAFI";
$db_name = "kosku";
$dir = $_SERVER['DOCUMENT_ROOT'];

$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name, 10015);

try {
	$conn;
} catch (Throwable $th) {
	echo "Error connecting to database " . $th;
}

mysqli_query(
  $conn,
  "create table admin
  (
    id int auto_increment
      primary key,
    name varchar(255) not null,
    username varchar(255) null,
    password varchar(255) not null
  )
  collate=utf8mb4_unicode_ci;"
);

echo mysqli_error($conn);

mysqli_query($conn, "create table kos
(
	id int auto_increment
		primary key,
	name varchar(255) null,
	address varchar(255) null,
	admin_id int null,
	kos_user int null,
	harga_kamar_mandi_dalam int null,
	harga_kamar_mandi_luar int null,
	constraint kos_admin_id_fk
		foreign key (admin_id) references admin (id)
			on delete cascade
);
");

echo mysqli_error($conn);

mysqli_query($conn, "create table anak_kos
(
	id int auto_increment
		primary key,
	nama varchar(255) null,
	asal varchar(255) null,
	hp varchar(15) null,
	id_kos int null,
	tipe tinyint(1) null,
	status varchar(50) null,
	lembaga varchar(100) null,
	username varchar(50) null,
	password varchar(100) null,
	constraint anak_kos_kos_id_fk
		foreign key (id_kos) references kos (id)
);

");

echo mysqli_error($conn);

mysqli_query($conn, "create table komplain
(
	id int auto_increment
		primary key,
	id_anak_kos int null,
	judul varchar(255) null,
	deskripsi text null,
	tanggal date null,
	selesai tinyint null,
	constraint komplain_anak_kos_id_fk
		foreign key (id_anak_kos) references anak_kos (id)
			on delete cascade
);
");

echo mysqli_error($conn);

mysqli_query($conn, "create table pembayaran
(
	id int auto_increment
		primary key,
	id_anak_kos int null,
	bulan int null,
	tahun int null,
	tgl_transaksi date null,
	constraint pembayaran_anak_kos_id_fk
		foreign key (id_anak_kos) references anak_kos (id)
			on delete cascade
);

");

echo mysqli_error($conn);

echo "Migrations OK";
