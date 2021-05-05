CREATE DATABASE lojaOnlineComputadores;
USE lojaOnlineComputadores;

CREATE TABLE computador (
	designacao 	VARCHAR(100) NOT NULL PRIMARY KEY,
	cpu			VARCHAR(30) NOT NULL,
	ram			VARCHAR(30) NOT NULL,
	disco		VARCHAR(30) NOT NULL,
	ecra		VARCHAR(30) NOT NULL
);

CREATE TABLE cliente (
	id_cliente	INTEGER IDENTITY(1,1) PRIMARY KEY,
	"user"		VARCHAR(32) NOT NULL,
	"password"	VARCHAR(60) NOT NULL -- ?????
);

CREATE TABLE fornecedor (
	id_forn		INTEGER IDENTITY(1,1) PRIMARY KEY,
);

CREATE TABLE funcionario (
	id_func		INTEGER IDENTITY(1,1) PRIMARY KEY,
);

CREATE TABLE pessoa (
	nome		VARCHAR(30) NOT NULL,
	id			INTEGER IDENTITY(1,1) PRIMARY KEY,
	morada		VARCHAR(70) NOT NULL,
	telefone	CHAR(9) NOT NULL,
	email		VARCHAR(40) NOT NULL,
	cliente		INTEGER REFERENCES cliente(id_cliente),
	funcionario	INTEGER REFERENCES funcionario(id_func),
	fornecedor	INTEGER REFERENCES fornecedor(id_forn),
	
	-- CONSTRAINT check_telefone CHECK (telefone like '[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]')
);

CREATE TABLE artigo (
	nSerie 		INTEGER IDENTITY(1,1) PRIMARY KEY,
	designacao 	VARCHAR(100) NOT NULL REFERENCES computador(designacao),
	preco 		DECIMAL(10,2) NOT NULL,
	comentario	VARCHAR(200)
);

CREATE TABLE venda (
	id_venda 	INTEGER IDENTITY(1,1) PRIMARY KEY,
	cliente		INTEGER REFERENCES cliente(id_cliente),
	data 		DATE,
	desconto	DECIMAL(5,2)
);

CREATE TABLE linhaVenda (
	venda		INTEGER REFERENCES venda(id_venda),
	artigo		INTEGER REFERENCES artigo(nSerie),
	quantidade 	INTEGER,
	
	PRIMARY KEY (venda, artigo)
);

INSERT INTO computador (designacao, cpu, ram, disco, ecra) values
('Portátil Gaming LENOVO Legion 5 Pro 16ACH6H', 'AMD Ryzen 7 5800H', '16 GB', '512 GB', '16'),
('Portátil Gaming MSI GP66 Leopard 10UE-059PT', 'Intel Core i7-10870H', '16 GB', '1 TB', '15.6'),
('Portátil Gaming ASUS ROG Strix SCAR 15 G532LWS', 'Intel Core I9-10980HK', '32 GB', '2 TB', '15.6'),
('Portátil HP Pavilion 15-eg0002np', 'Intel Core i5-1135G7', '12 GB', '512 GB', '15.6'),
('Portátil Gaming LENOVO Legion 5 15ARH05H', 'AMD Ryzen 5 4600H', '8 GB', '512 GB', '15.6'),
('Portátil Gaming ASUS TUF FX516PM-71A36CB1', 'Intel Core i7-11370H', '16 GB', '512 GB', '15.6'),
('Portátil Gaming ASUS ROG Zephyrus G14 GA401IU', 'AMD Ryzen 7 4800HS', '32 GB', '1 TB', '14')

INSERT INTO artigo (designacao, preco) values
('Portátil Gaming LENOVO Legion 5 Pro 16ACH6H', 1699),
('Portátil Gaming MSI GP66 Leopard 10UE-059PT', 1949),
('Portátil Gaming ASUS ROG Strix SCAR 15 G532LWS', 2799),
('Portátil HP Pavilion 15-eg0002np', 999.90),
('Portátil Gaming LENOVO Legion 5 15ARH05H', 998.99),
('Portátil Gaming ASUS TUF FX516PM-71A36CB1', 1649.90),
('Portátil Gaming ASUS ROG Zephyrus G14 GA401IU', 2139.90)


select * from artigo;
select * from computador;