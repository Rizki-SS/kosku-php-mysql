create table kos
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

