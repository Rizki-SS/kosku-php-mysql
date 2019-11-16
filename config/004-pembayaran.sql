create table pembayaran
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

