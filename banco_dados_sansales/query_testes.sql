select * from tb_options;
select * from tb_products_options;
desc tb_options;

SELECT nm_option FROM tb_options WHERE id_option = 1;

insert into tb_products_options (id_product, id_option, ds_value) values (3,1,"Vermelho");
insert into tb_products_options (id_product, id_option, ds_value) values (3,2,"19cm");