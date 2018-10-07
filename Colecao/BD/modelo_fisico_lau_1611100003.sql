DROP DATABASE IF EXISTS chufsc;
CREATE DATABASE chufsc DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

USE chufsc;

DROP USER IF EXISTS 'admrent'@'localhost';

CREATE USER 'admrent'@'localhost' IDENTIFIED BY '12345'; 

GRANT SELECT, INSERT, UPDATE, DELETE ON chufsc.* TO 'admrent'@'localhost';

CREATE TABLE familia(
	id_fam INTEGER AUTO_INCREMENT PRIMARY KEY,
	nome_fam VARCHAR(50) NOT NULL
);

insert into familia(id_fam,nome_fam) values (1, 'Colubridae');
insert into familia(id_fam,nome_fam) values (2, 'Viperidae');
insert into familia(id_fam,nome_fam) values (3, 'Elapide');
insert into familia(id_fam,nome_fam) values (4, 'Boidae');
insert into familia(id_fam,nome_fam) values (5, 'Typhlopidae');


CREATE TABLE genero(
	id_gen INTEGER AUTO_INCREMENT PRIMARY KEY,
	nome_gen VARCHAR(50) NOT NULL,
	id_fam INTEGER NOT NULL,
	FOREIGN KEY (id_fam) REFERENCES familia(id_fam) 	
);

insert into genero(id_gen,nome_gen, id_fam) values(1, 'Liophis', 1);
insert into genero(id_gen,nome_gen, id_fam) values(2, 'Erythrolamprus', 1);
insert into genero(id_gen,nome_gen, id_fam) values(3, 'Bothrops', 2);
insert into genero(id_gen,nome_gen, id_fam) values(4, 'Bothropoides', 2);
insert into genero(id_gen,nome_gen, id_fam) values(5, 'Crotalus', 2);
insert into genero(id_gen,nome_gen, id_fam) values(6, 'Caudisona', 2);
insert into genero(id_gen,nome_gen, id_fam) values(7, 'Micrurus', 3);
insert into genero(id_gen,nome_gen, id_fam) values(8, 'Leptomicrurus', 3);


CREATE TABLE especie(
	id_sp INTEGER AUTO_INCREMENT PRIMARY KEY,
	id_gen INTEGER NOT NULL,
	nome_sp VARCHAR(50) NOT NULL,
	FOREIGN KEY(id_gen) REFERENCES genero(id_gen)
);

insert into especie(id_sp,id_gen, nome_sp) values(1, 1, 'miliaris');
insert into especie(id_sp,id_gen, nome_sp) values(2, 2, 'miliaris');
insert into especie(id_sp,id_gen, nome_sp) values(3, 3, 'jararaca');
insert into especie(id_sp,id_gen, nome_sp) values(4, 4, 'jararaca');
insert into especie(id_sp,id_gen, nome_sp) values(5, 3, 'alcatraz');
insert into especie(id_sp,id_gen, nome_sp) values(6, 4, 'alcatraz');
insert into especie(id_sp,id_gen, nome_sp) values(7, 5, 'durissus');
insert into especie(id_sp,id_gen, nome_sp) values(8, 6, 'durissa');
insert into especie(id_sp,id_gen, nome_sp) values(9, 7, 'corallinus');
insert into especie(id_sp,id_gen, nome_sp) values(10, 7, 'altirostris');
insert into especie(id_sp,id_gen, nome_sp) values(11, 7, 'collaris');
insert into especie(id_sp,id_gen, nome_sp) values(12, 8, 'collaris');
insert into especie(id_sp,id_gen, nome_sp) values(13, 7, 'narducci');
insert into especie(id_sp,id_gen, nome_sp) values(14, 8, 'narducci');
insert into especie(id_sp,id_gen, nome_sp) values(15, 7, 'scutiventris');
insert into especie(id_sp,id_gen, nome_sp) values(16, 8, 'scutiventris');


CREATE TABLE sinonimo(
	id_sin INTEGER AUTO_INCREMENT PRIMARY KEY,
	id_sp_ant INTEGER NOT NULL REFERENCES especie(id_sp),
	id_sp_nov INTEGER NOT NULL REFERENCES especie(id_sp),
	data_modif DATE NOT NULL
);

insert into sinonimo(id_sp_ant, id_sp_nov, data_modif) values (1,2,'01-01-2016');
insert into sinonimo(id_sp_ant, id_sp_nov, data_modif) values (3,4,'01-01-2016');
insert into sinonimo(id_sp_ant, id_sp_nov, data_modif) values (4,3,'01-03-2016');
insert into sinonimo(id_sp_ant, id_sp_nov, data_modif) values (5,6,'01-01-2016');
insert into sinonimo(id_sp_ant, id_sp_nov, data_modif) values (6,5,'01-03-2016');
insert into sinonimo(id_sp_ant, id_sp_nov, data_modif) values (7,8,'01-01-2016');
insert into sinonimo(id_sp_ant, id_sp_nov, data_modif) values (8,9,'01-03-2016');
insert into sinonimo(id_sp_ant, id_sp_nov, data_modif) values (10,11,'01-03-2016');
insert into sinonimo(id_sp_ant, id_sp_nov, data_modif) values (12,13,'01-03-2016');
insert into sinonimo(id_sp_ant, id_sp_nov, data_modif) values (14,15,'01-03-2016');


CREATE TABLE localidade(
	id_local INTEGER AUTO_INCREMENT PRIMARY KEY,
	uf VARCHAR(2) NOT NULL,
	municipio VARCHAR(100) NOT NULL,
	localidade VARCHAR(200) NOT NULL
);

insert into localidade(id_local,uf,municipio,localidade) values (1, 'SC', 'Palhoça', 'Baixada do Maciambu');
insert into localidade(id_local,uf,municipio,localidade) values (2, 'SC', 'Florianópolis', 'Lagoa do Peri');
insert into localidade(id_local,uf,municipio,localidade) values (3, 'SC', 'Chapecó', 'FLONA');
insert into localidade(id_local,uf,municipio,localidade) values (4, 'SC', 'Concórdia', 'Parque Estadual Fritz Plaumann');
insert into localidade(id_local,uf,municipio,localidade) values (5, 'RS', 'Derrubadas', 'Parque Estadual do Turvo');

CREATE TABLE coletor(
	email VARCHAR(200) NOT NULL PRIMARY KEY,
	nome_col VARCHAR(200) NOT NULL,
	tel_col VARCHAR(20) NOT NULL
);

insert into coletor (email, nome_col, tel_col) values ('laura@gmail.com', 'Laura', '111');
insert into coletor (email, nome_col, tel_col) values ('larissa@gmail.com', 'Larissa', '222');
insert into coletor (email, nome_col, tel_col) values ('kika@gmail.com', 'Erica', '333');
insert into coletor (email, nome_col, tel_col) values ('anderson@gmail.com', 'Anderson', '444');
insert into coletor (email, nome_col, tel_col) values ('andre@gmail.com', 'Andre', '555');
insert into coletor (email, nome_col, tel_col) values ('vitor@gmail.com', 'Vitor', '666');
insert into coletor (email, nome_col, tel_col) values ('carola@gmail.com', 'Carol A', '777');
insert into coletor (email, nome_col, tel_col) values ('carolo@gmail.com', 'Carol O', '888');


CREATE TABLE coordenadas(
	id_coo INTEGER AUTO_INCREMENT PRIMARY KEY,
	x VARCHAR(50) NOT NULL,
	y VARCHAR(50) NOT NULL,
	unidade VARCHAR(100) NOT NULL,
	datum VARCHAR (100) NOT NULL
);


insert into coordenadas(id_coo, x, y, unidade, datum) values (1, '-27.844307', '-48.626985', 'grau decimal', 'SIRGAS 2000');
insert into coordenadas(id_coo, x, y, unidade, datum) values (2, '-27.733570', '-48.513650', 'grau decimal', 'SIRGAS 2000');
insert into coordenadas(id_coo, x, y, unidade, datum) values (3, '-27.084308', '-52.778524', 'grau decimal', 'SIRGAS 2000');
insert into coordenadas(id_coo, x, y, unidade, datum) values (4, '-27.291077', '-52.115122', 'grau decimal', 'SIRGAS 2000');
insert into coordenadas(id_coo, x, y, unidade, datum) values (5, '-27.211147', '-53.932302', 'grau decimal', 'SIRGAS 2000');

CREATE TABLE individuo(
	tombo INTEGER AUTO_INCREMENT PRIMARY KEY,
	id_sp INTEGER NOT NULL,
	id_local INTEGER NOT NULL,
	data_col DATE NOT NULL,
	coletor VARCHAR(200) NOT NULL,
	coordenadas INTEGER,
	obs VARCHAR(200),
	vidro VARCHAR(10) NOT NULL,
	FOREIGN KEY(id_sp) REFERENCES especie(id_sp),
	FOREIGN KEY(id_local) REFERENCES localidade(id_local),
	FOREIGN KEY(coletor) REFERENCES coletor(email),
	FOREIGN KEY(coordenadas) REFERENCES coordenadas(id_coo)
);

insert into individuo(id_sp, id_local, data_col, coletor, coordenadas, obs, vidro) values (1, 1, '2016-01-03', 'laura@gmail.com', 1, 'estava atropelado', 'V-01');
insert into individuo(id_sp, id_local, data_col, coletor, coordenadas, vidro) values (2, 2, '2016-04-01', 'larissa@gmail.com', 2, 'V-01');
insert into individuo(id_sp, id_local, data_col, coletor, coordenadas, obs, vidro) values (3, 3, '2016-04-01', 'kika@gmail.com', 3, 'criado dois dias em cativeiro antes da fixação', 'V-02');
insert into individuo(id_sp, id_local, data_col, coletor, coordenadas, vidro) values (4, 4, '2016-04-01', 'anderson@gmail.com', 4, 'V-02');
insert into individuo(id_sp, id_local, data_col, coletor, coordenadas, vidro) values (5, 5, '2016-04-01', 'andre@gmail.com', 5, 'V-03');
insert into individuo(id_sp, id_local, data_col, coletor, coordenadas, vidro) values (6, 1, '2016-04-10', 'vitor@gmail.com', 1, 'V-03');
insert into individuo(id_sp, id_local, data_col, coletor, coordenadas, vidro) values (7, 2, '2016-04-15', 'carola@gmail.com', 2, 'V-04');
insert into individuo(id_sp, id_local, data_col, coletor, coordenadas, vidro) values (8, 3, '2016-04-15', 'carolo@gmail.com', 3, 'V-04');
insert into individuo(id_sp, id_local, data_col, coletor, coordenadas, vidro) values (9, 4, '2016-09-24', 'laura@gmail.com', 4, 'V-05');
insert into individuo(id_sp, id_local, data_col, coletor, coordenadas, vidro) values (10, 5, '2016-02-16', 'larissa@gmail.com', 5, 'V-05');
insert into individuo(id_sp, id_local, data_col, coletor, coordenadas, vidro) values (11, 1, '2016-03-30', 'kika@gmail.com', 1, 'V-05');
insert into individuo(id_sp, id_local, data_col, coletor, coordenadas, vidro) values (12, 2, '2013-07-01', 'larissa@gmail.com', 2, 'V-05');
insert into individuo(id_sp, id_local, data_col, coletor, coordenadas, vidro) values (13, 1, '2010-12-30', 'kika@gmail.com', 1, 'V-05');
insert into individuo(id_sp, id_local, data_col, coletor, coordenadas, vidro) values (14, 2, '2013-07-19', 'larissa@gmail.com', 2, 'V-05');
insert into individuo(id_sp, id_local, data_col, coletor, coordenadas, vidro) values (15, 1, '2015-03-17', 'kika@gmail.com', 1, 'V-05');
insert into individuo(id_sp, id_local, data_col, coletor, coordenadas, vidro) values (16, 2, '2018-04-01', 'larissa@gmail.com', 2, 'V-05');

CREATE TABLE tecido(
	id_tec INTEGER AUTO_INCREMENT PRIMARY KEY,
	tombo INTEGER NOT NULL,
	tipo VARCHAR(100) NOT NULL,
	local VARCHAR(30) NOT NULL,
	FOREIGN KEY(tombo) REFERENCES individuo(tombo)
);

insert into tecido (tombo, tipo, local) values (1, 'FÍGADO', 'E01');
insert into tecido (tombo, tipo, local) values (1, 'CORAÇÃO', 'E02');
insert into tecido (tombo, tipo, local) values (5, 'FÍGADO', 'E03');
insert into tecido (tombo, tipo, local) values (7, 'FÍGADO', 'E04');
insert into tecido (tombo, tipo, local) values (9, 'CORAÇÃO', 'E05');
