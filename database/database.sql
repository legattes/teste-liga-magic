CREATE DATABASE ligamagic;

USE ligamagic;

CREATE TABLE Cliente(
    cliente_id BIGINT AUTO_INCREMENT PRIMARY KEY,
    cliente_nome VARCHAR(250) NOT NULL,
    cliente_token VARCHAR(250) NOT NULL
);

CREATE TABLE Produto (
    produto_id BIGINT AUTO_INCREMENT PRIMARY KEY,
    produto_nome VARCHAR(250) NOT NULL,
    produto_preco VARCHAR(250) NOT NULL,
    produto_imagem VARCHAR(250) NOT NULL,
    produto_updated_at DATETIME NOT NULL
);

INSERT INTO Cliente (cliente_nome, cliente_token) VALUES ('ligamagic', '2f3a4fccca6406e35bcf33e92dd93135');

INSERT INTO Produto (produto_nome, produto_preco, produto_imagem, produto_updated_at) VALUES ('Raio','9,50','raio.jpg','2020-01-03 09:07:06');
INSERT INTO Produto (produto_nome, produto_preco, produto_imagem, produto_updated_at) VALUES ('Negar','2,30','negar.png','2021-02-14 09:00:00');
INSERT INTO Produto (produto_nome, produto_preco, produto_imagem, produto_updated_at) VALUES ('Pacifismo','1,99','pacifismo.jpg','2019-10-19 05:34:12');
INSERT INTO Produto (produto_nome, produto_preco, produto_imagem, produto_updated_at) VALUES ('Crescimento Desenfreado','0,99','crescimento_desenfreado.jpg','2021-01-03 14:13:00');
INSERT INTO Produto (produto_nome, produto_preco, produto_imagem, produto_updated_at) VALUES ('Força Profana','6,66','forca_profana.jpg','2019-03-17 11:15:55');