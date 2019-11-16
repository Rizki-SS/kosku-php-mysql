create table anak_kos
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

