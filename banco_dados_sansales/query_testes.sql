select * from tb_options;
select * from tb_products_options;
desc tb_options;

SELECT nm_option FROM tb_options WHERE id_option = 1;

insert into tb_products_options (id_product, id_option, ds_value) values (3,1,"Vermelho");
insert into tb_products_options (id_product, id_option, ds_value) values (3,2,"19cm");


update tb_products set id_category = 10 where id_product = 9;
update tb_products set vl_price = 3199.00 where id_product = 5; 
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
        
        
select * from tb_categories order by cd_sub_categories DESC;

select * from tb_products;
select * from tb_products_images;


desc tb_brands;
select * from tb_brands;
desc tb_products;


select * from tb_products_images order by id_image asc;


select * from tb_products_options;
desc tb_products_options;
desc tb_products;
select * from tb_products;