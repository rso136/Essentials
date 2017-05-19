CREATE TABLE users
(
	id int NOT NULL AUTO_INCREMENT,
	userID varchar(280),
	pass varchar(280),
	PRIMARY KEY (id)
);

CREATE TABLE items
(
	id int NOT NULL AUTO_INCREMENT,
	userID varchar(280),
	item varchar(280),
	category varchar(280),
	quantity int NOT NULL,
	shopping BOOLEAN DEFAULT false, 
	PRIMARY KEY (id)
);