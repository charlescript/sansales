<?php
class Products extends model {

    public function getSaleCount($filters = array()) {
        $where = $this->buildWhere($filters);

        $where[] = 'ic_sale = "1"';

        $sql = "SELECT
        COUNT(*) as c
        FROM tb_products 
        WHERE ".implode(' AND ', $where);
        $sql = $this->db->prepare($sql);

        $this->bindWhere($filters, $sql);

        $sql->execute();

        if($sql->rowCount() > 0) {
            $sql = $sql->fetch();

            return $sql['c'];
        } else {
            return '0';
        }
    }

    public function getMaxPrice($filters = array()) {
        $where = $this->buildWhere($filters);

        $sql = "SELECT
        vl_price
        FROM tb_products 
        WHERE ".implode(' AND ', $where)."
        ORDER BY vl_price DESC
        LIMIT 1";
        $sql = $this->db->prepare($sql);

        $this->bindWhere($filters, $sql);

        $sql->execute();

        if($sql->rowCount() > 0) {
            $sql = $sql->fetch();

            return $sql['vl_price'];
        } else {
            return '0';
        }
    }

    public function getListOfStars($filters = array()) {
        $array = array();

        $where = $this->buildWhere($filters);

        $sql = "SELECT
        qt_rating, 
        COUNT(id_product) as c 
        FROM tb_products 
        WHERE ".implode(' AND ', $where)."
        GROUP BY qt_rating";
        $sql = $this->db->prepare($sql);

        $this->bindWhere($filters, $sql);

        $sql->execute();

        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        }

        return $array;
    } // Fim método getListOfStars


    public function getListOfBrands($filters = array()) {
        $array = array();

        $where = $this->buildWhere($filters);

        $sql = "SELECT
        id_brand, 
        COUNT(id_product) as c 
        FROM tb_products 
        WHERE ".implode(' AND ', $where)."
        GROUP BY id_brand";
        $sql = $this->db->prepare($sql);

        $this->bindWhere($filters, $sql);

        $sql->execute();

        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        }

        return $array;
    }  // Final de getListOfBrands

    public function getList($offset = 0, $limit = 3, $filters = array()) {  // $offset pnto de partida para paginação / $limit = 10 -> Quantidade de items que aparecerão na tela
        $array = array();

        $where = $this->buildWhere($filters);

        // A query abaixo faz consulta para buscar nome da marca e nome da categoria 
        $sql = "SELECT *,
            ( select tb_brands.nm_brand from tb_brands where tb_brands.id_brand = tb_products.id_brand ) as brand_name,
            ( select tb_categories.nm_categories from tb_categories where tb_categories.id_categories = tb_products.id_category) as category_name 
        FROM 
        tb_products 
        WHERE ".implode(' AND ', $where)."
        LIMIT $offset, $limit";
        $sql = $this->db->prepare($sql); 

        $this->bindWhere($filters, $sql);

        $sql->execute();
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


    public function getToTal($filters = array()){  // Função para pegar o total de items usado em homeController.php
        
        $where = $this->buildWhere($filters);

        $sql = "SELECT 
            COUNT(*) AS c 
            FROM tb_products
            WHERE ".implode(' AND ', $where);
        $sql = $this->db->prepare($sql);

        $this->bindWhere($filters, $sql);

        $sql->execute();
        $sql = $sql->fetch();

        return $sql['c'];
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


    private function buildWhere($filters) {

        $where = array(
            '1=1'
        );

        if(!empty($filters['category'])){  //criando o statement
            $where[] = "id_category = :id_category";
        }

        return $where;
    }

    private function bindWhere($filters, &$sql) {
        if(!empty($filters['category'])){ // Preenchendo statement
            $sql->bindValue(":id_category", $filters['category']);
        }
    }

} // Fim classe Products


/* "getList": Este método retorna uma lista de produtos.
 Ele usa uma consulta SQL para obter os dados dos produtos, incluindo o nome
  da marca e o nome da categoria. Ele também usa o método "getImagesByProductId" 
  para obter uma lista de imagens para cada produto. O método aceita dois 
  parâmetros opcionais: "offset" (ponto de partida para paginação) e 
  "limit" (quantidade de itens que aparecerão na tela).

"getTotal": Este método retorna o número total de itens na tabela "tb_products".


"getImagesByProductId": Este método retorna uma lista de imagens para um
 determinado produto, identificado pelo ID do produto. */