DROP DATABASE lojaOnlineComputadores;
CREATE DATABASE lojaOnlineComputadores;
USE lojaOnlineComputadores;

CREATE TABLE especificacao (
	id_especificacao INTEGER IDENTITY(1,1) PRIMARY KEY,
	designacao 	VARCHAR(200) NOT NULL	-- RAM / CPU
);

CREATE TABLE utilizador (
	email			VARCHAR(100) PRIMARY KEY,
	PasswordHash	BINARY(64) NOT NULL,
	categoria		VARCHAR(40) NOT NULL		-- (cliente ou funcionario)
);

CREATE TABLE cliente (
	id_cliente		INTEGER IDENTITY(1,1) PRIMARY KEY,
	"user"			VARCHAR(32) NOT NULL,
	nome			VARCHAR(60) NOT NULL,
	email			VARCHAR(100) REFERENCES utilizador(email),
	telefone		CHAR(9) NOT NULL,
	morada			VARCHAR(100) NOT NULL,
	nrContribuinte	CHAR(9) NOT NULL,
	metodoPagamento	VARCHAR(50) NOT NULL	-- Paypal, cartao de credito
);

CREATE TABLE fornecedor (
	id_forn		INTEGER IDENTITY(1,1) PRIMARY KEY,
	nome		VARCHAR(60) NOT NULL,
	email		VARCHAR(100),
	telefone	CHAR(9) NOT NULL,
	morada		VARCHAR(100) NOT NULL
);

CREATE TABLE funcionario (
	id_func		INTEGER IDENTITY(1,1) PRIMARY KEY,
	"user"		VARCHAR(32) NOT NULL,
	nome		VARCHAR(60) NOT NULL,
	email		VARCHAR(100) REFERENCES utilizador(email),
	telefone	CHAR(9) NOT NULL,
	morada		VARCHAR(100) NOT NULL
);

CREATE TABLE categoria (
	id_categoria 	INTEGER IDENTITY(1,1) PRIMARY KEY,
	designacao		VARCHAR(50) NOT NULL		-- (laptop, desktop)
);

CREATE TABLE artigo (
	nSerie 		INTEGER IDENTITY(1,1) PRIMARY KEY,
	designacao 	INTEGER NOT NULL REFERENCES categoria(id_categoria),
	preco 		DECIMAL(10,2) NOT NULL,
	comentario	VARCHAR(200),
	stock		INTEGER,
	stockMinimo	INTEGER
);

CREATE TABLE venda (
	id_venda 	INTEGER IDENTITY(1,1) PRIMARY KEY,
	cliente		INTEGER REFERENCES cliente(id_cliente),
	"data" 		DATE,
	desconto	DECIMAL(5,2)
);

CREATE TABLE linhaVenda (
	venda		INTEGER REFERENCES venda(id_venda),
	artigo		INTEGER REFERENCES artigo(nSerie),
	quantidade 	INTEGER,
	valor		DECIMAL(10,2)
	
	PRIMARY KEY (venda, artigo)
);

CREATE TABLE listaDesejos (
	id_cliente	INTEGER REFERENCES cliente(id_cliente),
	nSerie		INTEGER REFERENCES artigo(nSerie),
	"data" 		DATE
	
	PRIMARY KEY (id_cliente, nSerie)
);

CREATE TABLE encomenda (
	id_encomenda 	INTEGER IDENTITY(1,1) PRIMARY KEY,
	"data"			DATE,
	fornecedor		INTEGER REFERENCES fornecedor(id_forn)
);

CREATE TABLE artigo_encomenda (
	artigo		INTEGER REFERENCES artigo(nSerie),
	encomenda	INTEGER REFERENCES encomenda(id_encomenda),
	quantidade 	INTEGER,
	desconto	DECIMAL(5,2)
	
	PRIMARY KEY (artigo, encomenda)
);

CREATE TABLE artigo_especificacao (
	artigo			INTEGER REFERENCES artigo(nSerie),
	especificacao	INTEGER REFERENCES especificacao(id_especificacao),
	descricao		VARCHAR(50) NOT NULL		-- (i7, Ryzen 5)

	PRIMARY KEY (artigo, especificacao)
);





--INSERT INTO computador (designacao, cpu, ram, disco, ecra) values
--('Portátil Gaming LENOVO Legion 5 Pro 16ACH6H', 'AMD Ryzen 7 5800H', '16 GB', '512 GB', '16'),
--('Portátil Gaming MSI GP66 Leopard 10UE-059PT', 'Intel Core i7-10870H', '16 GB', '1 TB', '15.6'),
--('Portátil Gaming ASUS ROG Strix SCAR 15 G532LWS', 'Intel Core I9-10980HK', '32 GB', '2 TB', '15.6'),
--('Portátil HP Pavilion 15-eg0002np', 'Intel Core i5-1135G7', '12 GB', '512 GB', '15.6'),
--('Portátil Gaming LENOVO Legion 5 15ARH05H', 'AMD Ryzen 5 4600H', '8 GB', '512 GB', '15.6'),
--('Portátil Gaming ASUS TUF FX516PM-71A36CB1', 'Intel Core i7-11370H', '16 GB', '512 GB', '15.6'),
--('Portátil Gaming ASUS ROG Zephyrus G14 GA401IU', 'AMD Ryzen 7 4800HS', '32 GB', '1 TB', '14')

INSERT INTO artigo (designacao, preco) values
('Portátil Gaming LENOVO Legion 5 Pro 16ACH6H', 1699),
('Portátil Gaming MSI GP66 Leopard 10UE-059PT', 1949),
('Portátil Gaming ASUS ROG Strix SCAR 15 G532LWS', 2799),
('Portátil HP Pavilion 15-eg0002np', 999.90),
('Portátil Gaming LENOVO Legion 5 15ARH05H', 998.99),
('Portátil Gaming ASUS TUF FX516PM-71A36CB1', 1649.90),
('Portátil Gaming ASUS ROG Zephyrus G14 GA401IU', 2139.90)


select * from artigo;
-- select * from computador;