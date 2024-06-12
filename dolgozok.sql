CREATE TABLE IF NOT EXISTS dolgozok (
	id smallint(5) unsigned NOT NULL AUTO_INCREMENT,
	nev varchar(20) DEFAULT NULL,
	email varchar(28) DEFAULT NULL,
	mobil varchar(13) DEFAULT NULL,
	PRIMARY KEY (id)
);
