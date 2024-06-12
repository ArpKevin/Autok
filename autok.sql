CREATE TABLE IF NOT EXISTS autok (
	id smallint(5) unsigned NOT NULL AUTO_INCREMENT,
	fajta varchar(20) DEFAULT NULL,
	tipus varchar(77) DEFAULT NULL,
	gyartas varchar(60) DEFAULT NULL,
	km varchar(28) DEFAULT NULL,
	ara varchar(13) DEFAULT NULL,
	PRIMARY KEY (id)
);
