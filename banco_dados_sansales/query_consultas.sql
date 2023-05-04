

INSERT INTO tb_brands (nm_brand) values ("LG");
INSERT INTO tb_brands (nm_brand) values ("Samsung");
INSERT INTO tb_brands (nm_brand) values ("AOC");



insert into tb_categories (id_categories, nm_categories) values (6,"Monitor");


insert into tb_products (id_category, id_brand, nm_product, ds_product, qt_stock, vl_price, vl_price_from, qt_rating,ic_featured,ic_sale,ic_bestseller,ic_new_product) 
values (1,1,"Monitor 21 polegadas","Monitor com tela oled 144 Hertz.",10, 499,599,0,0,0,0,0);

insert into tb_products (id_category, id_brand, nm_product, ds_product, qt_stock, vl_price, vl_price_from, qt_rating,ic_featured,ic_sale,ic_bestseller,ic_new_product) 
values (1,2,"Monitor 18 polegadas","Alto fluxo de pixels com 120 Hertz",10, 399, 999, 0, 0, 0, 0, 0);

						
insert into tb_products (id_category, id_brand, nm_product, ds_product, qt_stock, vl_price, vl_price_from, qt_rating, ic_featured, ic_sale, ic_bestseller, ic_new_product, id_options) 
values (6,1,'Monitor 21 polegadas','Alguma descrição do produto.',10,499,599,0,0,1,1,0,NULL),
	   (6,2,'Monitor 18 polegadas','Alguma outra descrição',10,399,999,0,0,0,1,0,NULL),
	   (6,2,'Monitor 19 polegadas','Alguma outra descrição',10,599,699,0,0,0,0,1,NULL),
	   (6,3,'Monitor 17 polegadas','Alguma outra descrição',10,779,900,0,0,0,0,0,NULL),
	   (6,1,'Monitor 20 polegadas','Alguma outra descrição',10,299,499,0,0,0,0,1,NULL),
	   (6,3,'Monitor 20 polegadas','Alguma outra descrição',10,699,0,0,0,0,0,0,NULL),
	   (6,3,'Monitor 19 polegadas','Alguma outra descrição',10,889,999,0,0,0,0,0,NULL),
   	   (6,1,'Monitor 18 polegadas','Alguma outra descrição',10,599,699,0,0,0,0,0,NULL);
       

desc tb_options;
INSERT INTO tb_options (id_option, nm_option)
VALUES (1,'Cor'),
	   (2,'Tamanho'),
	   (3,'Memória RAM'),
	   (4,'Polegadas');
       



INSERT INTO tb_products_images (id_image, id_product, ds_url)
VALUE (1,1,'1.jpg'),
	  (2,2,'2.jpg'),
	  (3,3,'3.jpg'),
	  (4,4,'4.jpg'),
	  (5,5,'1.jpg'),
	  (6,6,'3.jpg'),
	  (7,7,'7.jpg'),
	  (8,8,'7.jpg');
      

SELECT * FROM tb_products_images;

SELECT * FROM TB_BRANDS;
SELECT * FROM TB_CATEGORIES;

show tables;

select * from tb_products_images;

select * from tb_products_images;

select * from tb_products;

show tables;


desc tb_brands;

select * from tb_brands;

select *,
	( select tb_products_images.id_image , tb_products_images.ds_url FROM tb_products_images WHERE tb_products.id_product = tb_products_images.id_product) FROM tb_products;


SELECT tb_products.id_brand, tb_products.nm_product, tb_products.id_product as "ID do produto", tb_products_images.id_product as "ID produto na imagem",tb_products_images.id_image, tb_products_images.ds_url
FROM tb_products
JOIN tb_products_images ON tb_products.id_product = tb_products_images.id_product;

SELECT ds_url FROM tb_products_images WHERE id_product = 2;


SELECT *,
        ( select tb_brands.nm_brand from tb_brands where tb_brands.id_brand = tb_products.id_brand ) as "brand_name",
        ( select tb_categories.nm_categories from tb_categories where tb_categories.id_categories = tb_products.id_category) as "category_name" 
        FROM tb_products;
        

update tb_products set ic_new_product = '1' where id_product = 6;


select * from tb_categories order by cd_sub_categories DESC;
insert into tb_categories (nm_categories) values ("Som");
insert into tb_categories (cd_sub_categories, nm_categories) values (7,"Headphones");
insert into tb_categories (cd_sub_categories, nm_categories) values (7,"Microfones");
insert into tb_categories (cd_sub_categories, nm_categories) values (8,"Com fio");
insert into tb_categories (cd_sub_categories, nm_categories) values (8,"Sem fio");

SELECT * FROM tb_categories WHERE cd_sub_categories = 8;
insert into tb_products (id_category, id_brand, nm_product, ds_product, qt_stock, vl_price, vl_price_from, qt_rating, ic_featured, ic_sale, ic_bestseller, ic_new_product, id_options) 
values (10,2,'Fones','Dolby Stereo.',10,499,799,0,0,1,1,0,NULL);

UPDATE tb_products set vl_price = 3799.00 where id_product = 5; 
select * from tb_products;
select * from tb_products_images;
insert into tb_products_images (id_product, ds_url)values(10,'10.jpg');
update tb_products_images set ds_url = '9.jpg' where id_image = 9;

desc tb_categories;
select * from tb_categories;

desc tb_brands;
select * from tb_brands;
desc tb_products;
insert into tb_brands (id_brand, nm_brand) values (4, "SONY");


show tables;

select * from tb_products_images order by id_image asc;
insert into tb_products_images(id_image, id_product, ds_url) values(11,9,"11.jpg");
insert into tb_products_images(id_image, id_product, ds_url) values(12,10,"12.jpg");
delete from tb_products_images where id_image = 10;


select * from tb_products;
update tb_products set qt_rating = 1 where id_product = 1;
desc tb_products;

delete from tb_products where id_product = 10;
insert into tb_products (id_product, id_category, id_brand, nm_product, ds_product, qt_stock, vl_price, vl_price_from)
values (9,8,4,"Headphone SONY ","Range de Frequência de 12-22.000 Hz
Driver Dinâmico de 30mm para um som mais balanceado e poderoso
Proteções de ouvido de almofadas macias para escutar suas músicas com mais conforto", 12, 143.00, 119.00);

insert into tb_products (id_product, id_category, id_brand, nm_product, ds_product, qt_stock, vl_price, vl_price_from)
values (10,11,4,"Headphone SONY (sem fio)","Ouça as suas faixas favoritas com a técnologia
sem fio Bluetooth emparelhando o seu smartphone ou tablet.", 15, 450.00, 490.00);

update tb_products set id_category = 10 where id_product = 9;
update tb_products set vl_price = 2199.00 where id_product = 5; 
update tb_products set vl_price_from = 143.00 where id_product = 9; 

show tables;

SELECT id_brand, COUNT(id_brand) as c FROM tb_products GROUP BY id_brand;
desc tb_brands;

select * from tb_brands;
insert into tb_brands (nm_brand) values("Apple");

SELECT
        id_brand, 
        COUNT(id_product) as c 
        FROM tb_products 
        GROUP BY id_brand;
        
SELECT
        qt_rating, 
        COUNT(id_product) as c 
        FROM tb_products 
        GROUP BY qt_rating;

select * from tb_products;
show tables;


desc tb_products;
update tb_products set qt_rating = 2 where id_product = 2;
update tb_products set ic_sale = 1 where id_product = 10;
desc tb_products;

select * from tb_options;
update tb_products set id_options = "1,2,4" where id_product = 1;
update tb_products set id_options = "1,2" where id_product = 2;
update tb_products set id_options = "1,2" where id_product = 3;
update tb_products set id_options = "1,4" where id_product = 4;
update tb_products set id_options = "1" where id_product = 5;
update tb_products set id_options = "1,2,4" where id_product = 6;
update tb_products set id_options = "2,4" where id_product = 7;
update tb_products set id_options = "1,4" where id_product = 8;
update tb_products set id_options = "1,4" where id_product = 9;
update tb_products set id_options = "1,2" where id_product = 10;

select * from tb_products_options;
desc tb_products_options;
desc tb_products;
select * from tb_products;

insert into tb_products_options (id_product, id_option, ds_value) values (1, 1, "Azul") ;
insert into tb_products_options (id_product, id_option, ds_value) values (1, 2, "23 cm") ;
insert into tb_products_options (id_product, id_option, ds_value) values (1, 4, "17") ;
insert into tb_products_options (id_product, id_option, ds_value) values (2, 1, "Preto");
insert into tb_products_options (id_product, id_option, ds_value) values (2, 2, "19 cm");

