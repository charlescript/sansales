

INSERT INTO tb_brands (nm_brand) values ("LG");
INSERT INTO tb_brands (nm_brand) values ("Samsung");
INSERT INTO tb_brands (nm_brand) values ("AOC");
insert into tb_brands (nm_brand) values("AOC");
insert into tb_brands (nm_brand) values("HP");


insert into tb_categories (id_categories, nm_categories) values (6,"Monitor");


insert into tb_products (id_category, id_brand, nm_product, ds_product, qt_stock, vl_price, vl_price_from, qt_rating,ic_featured,ic_sale,ic_bestseller,ic_new_product) 
values (1,3,"Monitor 21 polegadas","Monitor com tela oled 144 Hertz.",10, 499,599,0,0,0,0,0);

insert into tb_products (id_category, id_brand, nm_product, ds_product, qt_stock, vl_price, vl_price_from, qt_rating,ic_featured,ic_sale,ic_bestseller,ic_new_product) 
values (1,1,"Monitor 18 polegadas","Alto fluxo de pixels com 120 Hertz",10, 399, 999, 0, 0, 0, 0, 0);

						
insert into tb_products (id_category, id_brand, nm_product, ds_product, qt_stock, vl_price, vl_price_from, qt_rating, ic_featured, ic_sale, ic_bestseller, ic_new_product, id_options) 
values (6,8,'Monitor 21 polegadas','Alguma descrição do produto.',10,499,599,0,0,1,1,0,NULL),
	   (6,1,'Monitor 18 polegadas','Alguma outra descrição',10,399,999,0,0,0,1,0,NULL),
	   (6,1,'Monitor 19 polegadas','Alguma outra descrição',10,599,699,0,0,0,0,1,NULL),
	   (6,4,'Monitor 17 polegadas','Alguma outra descrição',10,779,900,0,0,0,0,0,NULL),
	   (6,1,'Monitor 20 polegadas','Alguma outra descrição',10,299,499,0,0,0,0,1,NULL),
	   (6,1,'Monitor 20 polegadas','Alguma outra descrição',10,699,0,0,0,0,0,0,NULL),
	   (6,4,'Monitor 19 polegadas','Alguma outra descrição',10,889,999,0,0,0,0,0,NULL),
   	   (6,4,'Monitor 18 polegadas','Alguma outra descrição',10,599,699,0,0,0,0,0,NULL);
       


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
      



update tb_products set ic_new_product = '1' where id_product = 6;



insert into tb_categories (nm_categories) values ("Som");
insert into tb_categories (cd_sub_categories, nm_categories) values (7,"Headphones");
insert into tb_categories (cd_sub_categories, nm_categories) values (7,"Microfones");
insert into tb_categories (cd_sub_categories, nm_categories) values (8,"Com fio");
insert into tb_categories (cd_sub_categories, nm_categories) values (8,"Sem fio");


insert into tb_products (id_category, id_brand, nm_product, ds_product, qt_stock, vl_price, vl_price_from, qt_rating, ic_featured, ic_sale, ic_bestseller, ic_new_product, id_options) 
values (10,2,'Fones','Dolby Stereo.',10,499,799,0,0,1,1,0,NULL);

UPDATE tb_products set vl_price = 3799.00 where id_product = 5; 

insert into tb_products_images (id_product, ds_url)values(10,'10.jpg');
update tb_products_images set ds_url = '9.jpg' where id_image = 9;


insert into tb_brands (id_brand, nm_brand) values (4, "SONY");



insert into tb_products_images(id_image, id_product, ds_url) values(11,9,"11.jpg");
insert into tb_products_images(id_image, id_product, ds_url) values(12,10,"12.jpg");
delete from tb_products_images where id_image = 10;



update tb_products set qt_rating = 1 where id_product = 1;


delete from tb_products where id_product = 10;
insert into tb_products (id_product, id_category, id_brand, nm_product, ds_product, qt_stock, vl_price, vl_price_from)
values (9,8,4,"Headphone SONY ","Range de Frequência de 12-22.000 Hz
Driver Dinâmico de 30mm para um som mais balanceado e poderoso
Proteções de ouvido de almofadas macias para escutar suas músicas com mais conforto", 12, 143.00, 119.00);

insert into tb_products (id_product, id_category, id_brand, nm_product, ds_product, qt_stock, vl_price, vl_price_from)
values (10,11,4,"Headphone SONY (sem fio)","Ouça as suas faixas favoritas com a técnologia
sem fio Bluetooth emparelhando o seu smartphone ou tablet.", 15, 450.00, 490.00);


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



insert into tb_products_options (id_product, id_option, ds_value) values (1, 1, "Azul") ;
insert into tb_products_options (id_product, id_option, ds_value) values (1, 2, "23 cm") ;
insert into tb_products_options (id_product, id_option, ds_value) values (1, 4, "17") ;
insert into tb_products_options (id_product, id_option, ds_value) values (2, 1, "Preto");
insert into tb_products_options (id_product, id_option, ds_value) values (2, 2, "19 cm");
insert into tb_products_options (id_product, id_option, ds_value) values (5, 1, "Preto");
INSERT INTO `db_loja_virtual`.`tb_products_options` (`id`, `id_product`, `id_option`, `ds_value`) VALUES ('9', '5', '2', '60cm');



update tb_products set qt_rating = 4 WHERE id_product = 1;
update tb_products set qt_rating = 4 WHERE id_product = 2;
update tb_products set qt_rating = 5 WHERE id_product = 3;
update tb_products set qt_rating = 3 WHERE id_product = 4;
update tb_products set qt_rating = 5 WHERE id_product = 5;
update tb_products set qt_rating = 4 WHERE id_product = 6;
update tb_products set qt_rating = 3 WHERE id_product = 7;
update tb_products set qt_rating = 4 WHERE id_product = 8;
update tb_products set qt_rating = 4 WHERE id_product = 9;
update tb_products set qt_rating = 5 WHERE id_product = 10;

update tb_products set id_options = "1,2,4" where id_product = 5;

update tb_products set ic_featured = 1 where id_product >=5;

UPDATE `db_loja_virtual`.`tb_products` SET `ic_sale` = '1' WHERE (`id_product` = '3');
UPDATE `db_loja_virtual`.`tb_products_options` SET `ds_value` = '29cm' WHERE (`id` = '2');
INSERT INTO `db_loja_virtual`.`tb_rates` (`id_product`, `id_user`, `dt_rate`, `qt_point`, `ds_comment`) VALUES ('2', '1', '2023-01-01', '2', 'Produto maravilhoso!');
INSERT INTO `db_loja_virtual`.`tb_rates` (`id_product`, `id_user`, `dt_rate`, `qt_point`, `ds_comment`) VALUES ('2', '2', '2023-01-12 15:22:33', '1', 'Não gostei do brilho da tela.');

insert into tb_users (id_user, ds_email, nm_user) values (1,"admin@admin","Charles"),
														 (2, "user@user","Teste");
                                                         
update tb_users set ds_password = "123" WHERE id_user = 1;
update tb_users set ds_password = "123" WHERE id_user = 2;
update tb_users set ds_password = "123" WHERE id_user = 2;
 


update tb_products set ds_product = "O monitor AOC de 21 polegadas é uma excelente opção para quem procura uma experiência de visualização envolvente e imersiva. 
Com sua tela Full HD, você pode desfrutar de imagens nítidas e detalhadas com cores vibrantes e precisas.
O monitor apresenta uma taxa de atualização de 60Hz e um tempo de resposta de 5ms, oferecendo uma qualidade de imagem suave e clara para jogos, filmes e outras aplicações.
A tecnologia IPS proporciona amplos ângulos de visão, permitindo que a qualidade da imagem permaneça consistente mesmo quando o monitor é visualizado de diferentes posições.
O contraste dinâmico de 50M:1 ajuda a destacar detalhes em cenas escuras e sombras.
O monitor AOC de 21 polegadas também possui recursos de ajuste, como brilho, contraste e temperatura de cor, para que você possa personalizar a imagem de acordo com suas preferências. 
Ele conta ainda com o modo Low Blue Light, que reduz a emissão de luz azul, reduzindo a fadiga ocular durante o uso prolongado.
O design do monitor é moderno e elegante, com bordas finas que maximizam a área útil da tela e oferecem uma experiência visual mais imersiva.
Ele possui conectividade VGA e HDMI, permitindo que você o conecte a diferentes dispositivos, como computadores, laptops e consoles de jogos.
Em resumo, o monitor AOC de 21 polegadas é uma excelente escolha para quem deseja uma experiência de visualização envolvente e imersiva.
 Com recursos avançados de ajuste, alta qualidade de imagem e conectividade flexível, ele é perfeito para uso geral, jogos e entretenimento. Se você procura um monitor de alta qualidade, o AOC de 21 polegadas é uma ótima opção." 
 WHERE id_product = 1;
 
 update tb_products set ds_product = "O monitor LG de 18 polegadas é uma excelente opção para quem procura uma tela compacta e de alta qualidade. Com sua resolução de 1366x768 pixels, você pode desfrutar de imagens nítidas e claras com cores vibrantes e detalhes precisos.
O monitor apresenta uma taxa de atualização de 60Hz e um tempo de resposta de 5ms, oferecendo uma qualidade de imagem suave e clara para jogos, filmes e outras aplicações.
A tecnologia TN proporciona um tempo de resposta ainda mais rápido e tem um excelente desempenho para jogos e aplicações com movimento rápido. Ele também possui recursos de ajuste, como brilho, contraste e temperatura de cor, para que você possa personalizar a imagem de acordo com suas preferências.
O design do monitor é moderno e compacto, tornando-o uma ótima opção para uso em espaços pequenos. Ele possui um suporte ajustável, permitindo que você ajuste a inclinação do monitor para a posição mais confortável para você.
O monitor LG de 18 polegadas é uma excelente escolha para quem procura uma tela compacta e de alta qualidade. Com recursos avançados de ajuste e um design moderno e compacto, ele é perfeito para uso geral, jogos e entretenimento. Se você procura um monitor confiável e de alta qualidade, o LG de 18 polegadas é uma ótima opção." 
WHERE id_product = 2;

update tb_products set ds_product = "O monitor HP de 19 polegadas é uma excelente escolha para quem procura uma tela de alta qualidade para uso geral e de entretenimento. Com sua resolução de 1366x768 pixels, você pode desfrutar de imagens claras e detalhadas com cores vibrantes e precisas.
O monitor apresenta uma taxa de atualização de 60Hz e um tempo de resposta de 5ms, oferecendo uma qualidade de imagem suave e clara para jogos, filmes e outras aplicações. Além disso, ele conta com tecnologia anti-reflexo, que reduz o brilho e o reflexo da luz, tornando-o ideal para uso em ambientes com luz intensa.
A tecnologia TN oferece um tempo de resposta rápido e excelente desempenho para jogos e aplicações com movimento rápido. Ele também possui recursos de ajuste, como brilho, contraste e temperatura de cor, para que você possa personalizar a imagem de acordo com suas preferências.
O design do monitor é moderno e elegante, com bordas finas que maximizam a área útil da tela e oferecem uma experiência visual mais imersiva. Ele possui um suporte ajustável, permitindo que você ajuste a inclinação do monitor para a posição mais confortável para você.
O monitor HP de 19 polegadas é uma excelente escolha para quem procura uma tela de alta qualidade para uso geral e de entretenimento. Com recursos avançados de ajuste, tecnologia anti-reflexo e um design moderno e elegante, ele é perfeito para uso em casa ou no escritório. Se você procura um monitor confiável e de alta qualidade, o HP de 19 polegadas é uma ótima opção." 
WHERE id_product = 3;

update tb_products set ds_product = "O monitor LG de 17 polegadas é uma excelente opção para quem procura uma tela compacta e de alta qualidade. Com sua resolução de 1280x1024 pixels, você pode desfrutar de imagens nítidas e claras com cores vibrantes e detalhes precisos.
O monitor apresenta uma taxa de atualização de 60Hz e um tempo de resposta de 5ms, oferecendo uma qualidade de imagem suave e clara para jogos, filmes e outras aplicações. Além disso, ele possui um ângulo de visão amplo, permitindo que você veja a tela claramente de qualquer posição.
A tecnologia TN proporciona um tempo de resposta ainda mais rápido e tem um excelente desempenho para jogos e aplicações com movimento rápido. Ele também possui recursos de ajuste, como brilho, contraste e temperatura de cor, para que você possa personalizar a imagem de acordo com suas preferências.
O design do monitor é moderno e compacto, tornando-o uma ótima opção para uso em espaços pequenos. Ele possui um suporte ajustável, permitindo que você ajuste a inclinação do monitor para a posição mais confortável para você.
O monitor LG de 17 polegadas é uma excelente escolha para quem procura uma tela compacta e de alta qualidade. Com recursos avançados de ajuste e um design moderno e compacto, ele é perfeito para uso geral, jogos e entretenimento. Se você procura um monitor confiável e de alta qualidade, o LG de 17 polegadas é uma ótima opção." 
WHERE id_product = 4;

update tb_products set ds_product = "O monitor LG de 20 polegadas de alto padrão oferece uma experiência visual excepcional. Com sua resolução de 1600x900 pixels, você pode desfrutar de imagens nítidas e claras com cores vibrantes e detalhes precisos.
O monitor apresenta uma taxa de atualização de 60Hz e um tempo de resposta rápido, oferecendo uma qualidade de imagem suave e clara para jogos, filmes e outras aplicações. Além disso, ele possui um amplo ângulo de visão, permitindo que você veja a tela claramente de qualquer posição.
O design do monitor é moderno e elegante, com bordas finas que maximizam a área útil da tela e oferecem uma experiência visual mais imersiva. Ele possui um suporte ajustável, permitindo que você ajuste a inclinação do monitor para a posição mais confortável para você.
O monitor LG de 20 polegadas de alto padrão também apresenta recursos avançados de ajuste, como brilho, contraste e temperatura de cor, para que você possa personalizar a imagem de acordo com suas preferências. Além disso, ele vem equipado com tecnologia Flicker-Safe, que ajuda a reduzir o cansaço visual durante longas sessões de uso.
Este monitor é perfeito para quem busca um alto padrão de qualidade de imagem e design elegante em um tamanho compacto. Se você procura um monitor confiável e de alta qualidade, o LG de 20 polegadas de alto padrão é uma excelente escolha." 
WHERE id_product = 5;

update tb_products set ds_product = "Os monitores Sony de alto padrão são conhecidos por sua qualidade de imagem excepcional e design elegante. Eles apresentam tecnologias avançadas, como painéis IPS ou VA, que oferecem um amplo ângulo de visão e cores vivas e precisas.
Além disso, esses monitores geralmente possuem resoluções de tela de 4K ou superior, proporcionando imagens detalhadas e nítidas. Eles também apresentam taxas de atualização rápidas e tempos de resposta baixos, tornando-os ideais para jogos e outras aplicações que exigem movimento rápido na tela.
O design dos monitores Sony é sofisticado e elegante, com bordas finas e suportes ajustáveis, que permitem uma experiência de visualização confortável e imersiva. Eles também apresentam recursos avançados de ajuste, como brilho, contraste e temperatura de cor, permitindo que você personalize a imagem de acordo com suas preferências.
Em resumo, se você estiver procurando por um monitor de alto padrão, os monitores Sony são uma excelente escolha. Com sua qualidade de imagem excepcional e design sofisticado, eles são ideais para jogos, entretenimento e uso geral." WHERE 
id_product = 6;

update tb_products set ds_product = "" 
WHERE id_product = 7;

update tb_products set ds_product = "O monitor LG de 18 polegadas é uma excelente opção para quem precisa de um monitor compacto e de alta qualidade. Com sua tela de 18 polegadas, é possível ter uma experiência de visualização imersiva e confortável em um espaço de trabalho limitado.
Este monitor LG apresenta uma resolução nativa de 1366 x 768, oferecendo imagens claras e nítidas para trabalhar, jogar ou assistir a filmes e vídeos. Além disso, ele conta com tecnologia LED, que proporciona cores vivas e brilhantes, além de um consumo de energia mais eficiente em relação a outros tipos de iluminação.
O monitor LG de 18 polegadas também conta com recursos avançados, como um tempo de resposta rápido de 5ms e uma taxa de atualização de 60Hz, o que torna ideal para jogos e outras aplicações que exigem movimento rápido na tela. Além disso, ele apresenta um ângulo de visão amplo de até 170 graus, permitindo que você visualize o conteúdo em praticamente qualquer ângulo.
O design do monitor LG de 18 polegadas é elegante e minimalista, com bordas finas e um suporte ajustável que permite ajustar a altura e o ângulo de visualização de acordo com suas preferências. Além disso, ele conta com uma variedade de portas, incluindo VGA e HDMI, para que você possa conectar facilmente seus dispositivos.
Em resumo, o monitor LG de 18 polegadas é uma ótima escolha para quem busca um monitor compacto e de alta qualidade. Com sua tecnologia avançada e design elegante, ele é ideal para uso em casa ou no escritório."
 WHERE id_product = 8;

update tb_products set ds_product = "
O headphone com fio da Sony é uma excelente opção para quem procura qualidade de som excepcional e conforto durante o uso prolongado. Com seus drivers dinâmicos de neodímio de 40mm, este headphone produz som de alta qualidade, com graves potentes e agudos cristalinos.
Este headphone da Sony possui um design acolchoado em torno da orelha, proporcionando conforto mesmo durante longas sessões de uso. Além disso, ele possui um cabo de 1,2 metros com conectores banhados a ouro para melhor qualidade de áudio e durabilidade.
Com sua faixa de frequência ampla de 5Hz a 22kHz, o headphone da Sony reproduz o som de forma clara e detalhada em todo o espectro de frequência. Ele também possui um design dobrável, tornando-o fácil de guardar e transportar.
O headphone com fio da Sony é compatível com uma ampla variedade de dispositivos, incluindo smartphones, tablets, laptops e sistemas de áudio. Ele também vem com um adaptador de 6,3 mm, permitindo que você o conecte a equipamentos de áudio de alta fidelidade.
Em resumo, o headphone com fio da Sony é uma ótima opção para quem busca qualidade de som excepcional, conforto e durabilidade. Com seu design elegante e recursos avançados, ele é ideal para uso em casa, no trabalho ou em movimento." 
WHERE id_product = 9;

update tb_products set ds_product = "O headphone sem fio da Sony é uma excelente opção para quem procura um som de alta qualidade e liberdade de movimento. Ele é projetado para oferecer uma experiência de áudio imersiva, sem fios para atrapalhar, permitindo que você se mova livremente enquanto ouve suas músicas, podcasts ou assiste a filmes e vídeos.
Este headphone da Sony possui tecnologia Bluetooth, permitindo que você se conecte facilmente a dispositivos móveis, como smartphones, tablets e laptops. Além disso, ele conta com um sistema de cancelamento de ruído ativo, que bloqueia o ruído externo e permite que você ouça claramente apenas o som que deseja.
Com drivers de neodímio de 40mm, este headphone da Sony produz um som de alta qualidade, oferecendo graves profundos e agudos cristalinos. Ele também possui controles de toque intuitivos, permitindo que você ajuste o volume, mude de faixa ou atenda chamadas com facilidade.
O headphone sem fio da Sony possui uma bateria de longa duração, permitindo que você ouça suas músicas favoritas por até 35 horas com uma única carga. Além disso, ele é dobrável e fácil de transportar, permitindo que você o leve para onde quiser.
Em resumo, o headphone sem fio da Sony é uma ótima opção para quem busca um som de alta qualidade, liberdade de movimento e conforto. Com seu design elegante e recursos avançados, ele é ideal para uso em casa, no trabalho ou em movimento."
 WHERE id_product = 10;
 
 
 insert into tb_products_images (id_image, id_product, ds_url) 
values(13,5,"13.jpg"),
	  (14,5,"14.jpg"),
      (15,5,"15.jpg");