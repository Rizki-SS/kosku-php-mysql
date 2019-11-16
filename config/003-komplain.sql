create table komplain
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

