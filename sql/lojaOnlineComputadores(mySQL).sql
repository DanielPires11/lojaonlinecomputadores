CREATE DATABASE lojaOnlineComputadores;
USE lojaOnlineComputadores;

CREATE TABLE artigo (
    nSerie      INTEGER NOT NULL AUTO_INCREMENT,
    designacao  INTEGER NOT NULL REFERENCES categoria(id_categoria),
    preco       DECIMAL(10,2) NOT NULL,
    fotografia  VARCHAR(500) NOT NULL,
    comentario  VARCHAR(200),
    stock       INTEGER,
    stockMinimo INTEGER,

    PRIMARY KEY (nSerie)
);

CREATE TABLE artigo_encomenda (
    artigo      INTEGER REFERENCES artigo(nSerie),
    encomenda   INTEGER REFERENCES encomenda(id_encomenda),
    quantidade  INTEGER,
    desconto    DECIMAL(5,2),

    PRIMARY KEY (artigo,encomenda)
);

CREATE TABLE artigo_especificacao (
    artigo          INTEGER REFERENCES artigo(nSerie),
    especificacao   INTEGER REFERENCES especificacao(id_especificacao),
    descricao       VARCHAR(500) NOT NULL,

    PRIMARY KEY (artigo,especificacao)
); 

CREATE TABLE categoria (
    id_categoria    INTEGER NOT NULL AUTO_INCREMENT,
    designacao      VARCHAR(50) NOT NULL,

    PRIMARY KEY (id_categoria)
); 

CREATE TABLE cliente (
    id_cliente          INTEGER NOT NULL AUTO_INCREMENT,
    user                VARCHAR(32) NOT NULL,
    nome                VARCHAR(60) NOT NULL,
    email               VARCHAR(100) REFERENCES utilizador(email),
    telefone            CHAR(9) NOT NULL,
    morada              VARCHAR(100) NOT NULL,
    nrContribuinte      CHAR(9) NOT NULL,
    metodoPagamento     VARCHAR(50) NOT NULL,

    PRIMARY KEY (id_cliente)
); 

CREATE TABLE encomenda (
    id_encomenda    INTEGER NOT NULL AUTO_INCREMENT,
    data          	DATE,
    fornecedor      INTEGER REFERENCES fornecedor(id_forn),

    PRIMARY KEY (id_encomenda)
); 

CREATE TABLE especificacao (
    id_especificacao    INTEGER NOT NULL AUTO_INCREMENT,
    cpu                 VARCHAR(200) NOT NULL,
    ram                 VARCHAR(50) NOT NULL,
    disco               VARCHAR(50) NOT NULL,
    ecra                VARCHAR(50) NOT NULL,
    placaGrafica        VARCHAR(50) NOT NULL,

    PRIMARY KEY (id_especificacao)
); 

CREATE TABLE fornecedor (
    id_forn     INTEGER NOT NULL AUTO_INCREMENT,
    nome        VARCHAR(60) NOT NULL,
    email       VARCHAR(100),
    telefone    CHAR(9) NOT NULL,
    morada      VARCHAR(100) NOT NULL,

    PRIMARY KEY (id_forn)
); 

CREATE TABLE funcionario (
    id_func     INTEGER NOT NULL AUTO_INCREMENT,
    user        VARCHAR(32) NOT NULL,
    nome        VARCHAR(60) NOT NULL,
    email       VARCHAR(100) REFERENCES utilizador(email),
    telefone    CHAR(9) NOT NULL,
    morada      VARCHAR(100) NOT NULL,

    PRIMARY KEY (id_func)
); 

CREATE TABLE linhavenda (
    venda       INTEGER REFERENCES venda(id_venda),
    artigo      INTEGER REFERENCES artigo(nSerie),
    quantidade  INTEGER,
    valor       DECIMAL(10,2),

    PRIMARY KEY (venda,artigo)
); 

CREATE TABLE listadesejos (
    id_cliente  INTEGER REFERENCES cliente(id_cliente),
    nSerie      INTEGER REFERENCES artigo(nSerie),
    data      	DATE DEFAULT NULL,

    PRIMARY KEY (id_cliente,nSerie)
); 

CREATE TABLE utilizador (
    email           VARCHAR(100) NOT NULL,
    PasswordHash    VARCHAR(64) NOT NULL,
    categoria       VARCHAR(40) NOT NULL,

    PRIMARY KEY (email)
);

CREATE TABLE venda (
    id_venda        INTEGER NOT NULL AUTO_INCREMENT,
    cliente         INTEGER REFERENCES cliente(id_cliente),
    data          	DATE,
    desconto        DECIMAL(5,2),

    PRIMARY KEY (id_venda)
);



-- cliente, funcionario e utilizador
INSERT INTO cliente
values (1, 'cliente1', 'Zé Manuel', 'zemanuel@gmail.com', '999999999', 'Rua de Carcavelinhos, 222', '222222222', 'Paypal');

INSERT INTO utilizador
values ('zemanuel@gmail.com', '123+qwe', 'cliente');

INSERT INTO funcionario
values (1, 'funcionario1', 'José Pedro', 'josepedro@gmail.com', '999999998', 'Rua de Carcavelinhos, 223');

INSERT INTO utilizador
values ('josepedro@gmail.com', '123+qwe', 'funcionario');

-- categoria, artigo, artigo_especificacao, especificacao
-- artigo 1
-- https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.switchtechnology.pt%2Fimage%2Fcache%2Fdata%2FNXHUMMERZEROBK-1000x1000.png&f=1&nofb=1

INSERT INTO categoria
values (1, 'Desktop AMD BL-DR33DD1');

INSERT INTO artigo (nSerie, designacao, preco, fotografia, stock, stockMinimo)
values (1000000000, 1, 399.00, 'imagens/Desktops/PC1.png', 10, 2);

INSERT INTO artigo_especificacao (artigo, especificacao, descricao)
values (1000000000, 1, 'Processador: AMD Ryzen™ 3 PRO 4350G 6MB Cache Placa(s) Gráfica(s): AMD Radeon™ Graphics Memória RAM: 8GB Disco SSD: 500GB'); 

INSERT INTO especificacao (cpu, ram, disco, ecra, placaGrafica)
values ('AMD Ryzen™ 3 PRO 4350G 6MB Cache', '8GB', 'SSD 500GB', '', 'AMD Radeon™ Graphics');

-- artigo 2
-- https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcdncloudcart.com%2F15366%2Fproducts%2Fimages%2F388%2Fgaming-pc-omen-25l-desktop-gt12-0036ng-image_601c563d06a7e_800x800.png%3F1612469851&f=1&nofb=1
INSERT INTO categoria
values (2, 'OMEN 25L Desktop GT12-0027np');

INSERT INTO artigo (nSerie, designacao, preco, fotografia, stock, stockMinimo)
values (1000000001, 2, 949.90, 'imagens/Desktops/PC2.png',  10, 2);

INSERT INTO artigo_especificacao (artigo, especificacao, descricao)
values (1000000001, 2, 'Processador: Intel® Core™ i5-10400 12MB Cache Placa(s) Gráfica(s): GeForce® GTX 1660 SUPER 6GB Memória RAM: 16GB Disco SSD: 256GB + HDD 1TB'); 

INSERT INTO especificacao (cpu, ram, disco, ecra, placaGrafica)
values ('Intel® Core™ i5-10400 12MB Cache', '16GB', 'SSD 256GB + HDD 1TB', '', 'GeForce® GTX 1660 SUPER 6GB');

-- artigo 3
-- https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.mybest.my%2Fimage%2Fmybest%2Fimage%2Fcache%2Fdata%2Fall_product_images%2Fproduct-2477%2FKJ9DjGbq1579166598-800x600.png&f=1&nofb=1
INSERT INTO categoria
values (3, 'OMEN 25L Desktop GT12-0027np');

INSERT INTO artigo (nSerie, designacao, preco, fotografia, stock, stockMinimo)
values (1000000002, 3, 279.90, 'imagens/Desktops/PC3.png',  10, 2);

INSERT INTO artigo_especificacao (artigo, especificacao, descricao)
values (1000000002, 3, 'Processador: Intel® Celeron® J4005 4MB Cache Placa(s) Gráfica(s): Intel UHD Graphics 600 Memória RAM: 8GB Disco SSD: 256GB'); 

INSERT INTO especificacao (cpu, ram, disco, ecra, placaGrafica)
values ('Intel® Celeron® J4005 4MB Cache', '8GB', 'SSD 256GB', '', 'Intel UHD Graphics 600');

-- artigo 4
-- https://static.pcdiga.com/media/catalog/product/8/8/8821.jpg
INSERT INTO categoria
values (4, 'Desktop AMD Gaming GML-MR55RC1');

INSERT INTO artigo (nSerie, designacao, preco, fotografia, stock, stockMinimo)
values (1000000003, 4, 1699.00, 'imagens/Desktops/PC4.png',  10, 2);

INSERT INTO artigo_especificacao (artigo, especificacao, descricao)
values (1000000003, 4, 'Processador: AMD Ryzen 5 5600X 35MB Cache Placa(s) Gráfica(s): MSI Radeon RX 6700 12GB Memória RAM: 16GB Disco SSD: 500GB'); 

INSERT INTO especificacao (cpu, ram, disco, ecra, placaGrafica)
values ('AMD Ryzen 5 5600X 35MB Cache', '16GB', 'SSD 500GB', '', 'MSI Radeon RX 6700 12GB');
