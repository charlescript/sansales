create database db_loja_virtual;

use db_loja_virtual;

create table tb_categories(   /*Tabela categorias  */
	id_categories int(11) unsigned primary key auto_increment not null ,    /*-> ID*/
	cd_sub_categories int(11),       /*Verifica se há categoria pai   -> SUB */
    nm_categories varchar(100) not null  /*Verifica nome categoria    -> NAME*/
);



create table tb_brands(   /* Tabela marcas*/
	id_brand int(11) unsigned primary key auto_increment not null,  /* ID */
    nm_brand varchar(100) not null                     /* NAME */
);

create table tb_products_images(
	id_image int(11) unsigned primary key not null auto_increment, 
    id_product int(11) not null,    /*Vai linkar na tabela TB_PRODUCTS no ID_PRODUCT */
    ds_url varchar(50) not null  /*Aqui vai ser armazenada a rota da imagem*/
);

create table tb_rates(  /*Tabela RATES onde serão armazenados os votos de cada usuário */
	id_rate int(11) unsigned primary key not null auto_increment,  
	id_product int(11) not null,   /*Vai linkar na tabela TB_PRODUCTS com QT_RATING*/
    id_user int(11) not null,  /* Vai linkar com o na tabela de usuários TB_USERS com ID_USER*/
    dt_rate datetime not null,  /*DATE_RATED Vai armazenar a data do voto*/
    qt_point int(2) not null,  /* POINTS  Vair armazenar o valor do voto de 1 a 5*/
    ds_comment text   /*COMMENT Aqui será armazenado o comentário do cliente*/
);

create table tb_products(  /* Tabela Produtos*/
	id_product int(11) unsigned primary key auto_increment not null,   /* ID */
    id_category int(11) not null,        /* Vai linkar com a tabela TB_CATEGORIES no ID_CATEGORIES */
    id_brand int(11) not null,           /* Vai linkar na tabela TB_BRANDS no ID_BRANDS*/
    nm_product varchar(100) not null,     /* NAME    NOME DO PRODUTO*/        
    ds_product text,                     /*DESCRIPTION   descrição do produto*/
    qt_stock int(11) not null,           /*STOCK   Quantidade desse produto em estoque*/  
    vl_price float(10,2) not null,        /*PRICE   Preço do produto*/
    vl_price_from float(10,2) not null,    /*PRICE_FROM  Preço do produto em promoção*/
    qt_rating float  not null,              /* RATING Média de votação do produto*/
    ic_featured tinyint(1) not null,           /* FEATURED Campo usado para verificar se produto está em destaque ou não*/
	ic_sale tinyint(1) not null,               /* SALE  Verifica se o produto está em promoção*/
    ic_bestseller tinyint(1) not null,        /*BESTSELLER  Classifica se o produto está nos mais vendidos*/
    ic_new_product tinyint(1) not null,       /*NEW_PRODUCT   Classifica se o produto é novo na loja*/
    id_options varchar(200)                   /*OPTIONS  Vai linkar com a tabela TB_OPTIONS ao ID_OPTION  -> Aqui colocaremos os opcionais do produto separado por virgula*/
);

/* Na tablea tb_products (ds_options varchar(200))  para ( id_options int(11) )  -> 
Originamente coloquei como varchar mas alterarei para int visando linkar esse atributo com a tabela tb_options*/
/*ALTER TABLE tb_products RENAME COLUMN ds_options TO id_options;
ALTER TABLE tb_products MODIFY id_options int(11);
desc tb_products; */

create table tb_products_options(   /*PRODUCTS_OPTIONS  VAI INTERLIGAR AS TABELAS TB_PRODUCTS E TB_OPTIONS  COMO UMA TABELA DE RESOLUÇÃO*/
	id INT(11) unsigned primary key auto_increment not null,
    id_product int(11) not null,   /*Vai linkar na tabela TB_PRODUCTS COM ID_PRODUCTS */
    id_option int(11) not null,   /*Vai linkar na tabela TB_OPTIONS com ID_OPTION*/
    ds_value varchar(100)      /*Nesse campo será inserido cor, tamanho, peso, dimensões do produto*/
);

create table tb_options(
	id_option int(11) unsigned primary key auto_increment not null,  /*Vai linkar com a tabela TB_PRODUCTS_OPTIONS no ID_OPTION*/
    nm_option varchar(100) not null
);

create table tb_users(
	id_user int(11) unsigned primary key auto_increment not null, 
    ds_email varchar(100) not null,
    ds_password varchar(32) not null
);

create table tb_pages(  /*Tabela PAGES onde será armazenado as páginas estáticas*/
	id_page int(11) unsigned primary key auto_increment not null,
	ds_title varchar(100) not null,   /*Titulo da página*/
    ds_body text not null             /*Corpo da página*/
);

create table tb_purchases(   /*Tabela compras*/
	id_purchase int(11) unsigned primary key not null,  /* ID da compra*/
	id_user int(11) not null,    /*Linkará com a tabelar TB_USERS no id_user */
    id_coupon int(11), /* Linkará com a tabela TB_COUPONS no ID_COUPON Aqui será armzenado cupom de desconto utilizado na compra*/
    vl_total_amount float not null,     /*Aqui será armazenado o valor imputado na compra */
    cd_payment_type int(11),   /*Aqui será armazenado o tipo de pagamento*/
    cd_payment_status int(11)  /*Aqui será armazenado o status do pagamento*/
);


create table tb_coupons(  /*Tabela de cupons*/
	id_coupon int(11) unsigned primary key not null auto_increment,
    ds_name varchar(100) not null, /*Aqui será armazenado o código do cupom*/
    cd_coupon_type int(11) not null, /*Aqui será armazenado o tipo de cupon e que desconto ele proverá do tipo porcentagem ou valor sobre compra*/
	vl_coupon float not null       /*Valor do desconto*/
);

create table tb_purchases_products(  /*Tabela de que associa compras aos produtos*/
	id int(11) unsigned primary key not null auto_increment,  /**/
    id_purchase int(11) not null, /* Linkará com a tabela TB_PURCHASES ao id_purchase*/
    id_product int(11) not null,  /* linkará com a atabela TB_PRODUCTS ao id_id_product*/
    qt_product int(11) not null /* QUANTITY Aqui será armazenado a quantidade de produto que está sendo comprado*/
);

create table tb_purchase_transactions(  /*Tabela que identificará os tipos de pagamentos feitos em uma só compra*/
	id int(11) unsigned primary key not null auto_increment, /* */
	id_purchase int(11) not null,  /*Linkará com a TB_PURCHASES ao id_purchase para associar*/
	vl_amount float,  /*Aqui armazenará a quantia envolvida na transação*/
    ds_transaction_code int(11)  /*Código de transação*/
);

desc tb_purchases;
show tables ;

