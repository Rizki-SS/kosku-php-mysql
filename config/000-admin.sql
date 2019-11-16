create table admin
(
	id int auto_increment
		primary key,
	name varchar(255) not null,
	username varchar(255) null,
	password varchar(255) not null
)
collate=utf8mb4_unicode_ci;

