CREATE DATABASE loja;

use loja;

CREATE TABLE tb_categorias(
	id_categoria int(11) primary key auto_increment not null,
    ds_titulo varchar(100) not null
);


CREATE TABLE tb_produtos(
	id_produto int(11) primary key auto_increment not null,
    id_categoria int(11) not null,   /*Vai linkar com a tabela TB_CATEGORIA->id_categoria*/
    ds_nome_produto varchar(100) not null,
    im_produto varchar(36) not null,
    vl_preco float(10,2) not null,
    qt_produto int(11) not null,
    ds_produto TEXT 
);


CREATE TABLE tb_vendas(
	id_venda int(11) primary key auto_increment not null,
    id_usuario int(11) not null,  /*vai linkar na TB_USUARIOS->id_usuario*/
    id_produto int(11) not null,  /*Vai linkar na TB_PRODUTOS->id_produtos*/
    qt_produto int(11) not null,
    ds_endereco TEXT,
    vl_venda float(10,2) not null,  /*valor*/
    ic_forma_pg int(11) not null /*forma de pagamento*/
);

CREATE TABLE tb_usuarios(
	id_usuario int(11) primary key auto_increment not null,
    nm_usuario varchar(100) not null,
    ds_email varchar(50) not null,
    ds_senha varchar(50) not null
);

CREATE TABLE tb_pagamentos(
	id_pagamento int(11) primary key not null auto_increment,
    nm_pagamento varchar(100) not null
);


INSERT INTO TB_PAGAMENTOS (nm_pagamento) values("Grátis");
INSERT INTO TB_PAGAMENTOS (nm_pagamento) values("Pagseguro");
INSERT INTO TB_PAGAMENTOS (nm_pagamento) values("Paypal");
INSERT INTO TB_PAGAMENTOS (nm_pagamento) values("Boleto");

select * from tb_pagamentos;