CREATE TABLE Produto (
    produto_id BIGINT AUTO_INCREMENT PRIMARY KEY,
    produto_nome VARCHAR(250) NOT NULL,
    produto_preco VARCHAR(250) NOT NULL,
    produto_imagem VARCHAR(250),
    produto_updated_at DATETIME NOT NULL
);

CREATE TABLE Cliente(
    cliente_id BIGINT AUTO_INCREMENT PRIMARY KEY,
    cliente_nome VARCHAR(250) NOT NULL,
    cliente_token VARCHAR(250)
);


//falta inserts