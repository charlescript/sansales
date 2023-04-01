<?php

class Products extends model {

    public function getList() {
        $array = array();

        // A query abaixo faz consulta para buscar nome da marca e nome da categoria 
        $sql = "SELECT *,
        ( select tb_brands.nm_brand from tb_brands where tb_brands.id_brand = tb_products.id_brand ) as brand_name,
        ( select tb_categories.nm_categories from tb_categories where tb_categories.id_categories = tb_products.id_category) as category_name 
        FROM tb_products";
        $sql = $this->db->query($sql); 

        if ($sql->rowCount() > 0) {

            $array = $sql->fetchAll(); // Peguei todos os produtos da consulta e inseri no $array

            foreach($array as $key => $item) {

                //$array[$key]['images'] = $this->getImagesByProductId($item['id_product']);
                $images = $this->getImagesByProductId($item['id_product']);
                $array[$key]['images'] = $images;
            }
        
        }

        return $array;
    }


    public function getImagesByProductId($id){
        $array = array();
        
        // Nessa query abaixo buscarei a URL da imagem do produto tomando como referencia o ID do produto
        $sql = "SELECT ds_url FROM tb_products_images WHERE id_product = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        }

        return $array;
    } // Fim getImagesByProductId


} // Fim classe Products


