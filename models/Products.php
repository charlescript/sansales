<?php
class Products extends model {

    public function getAvailableOptions($filters = array()) {
        $groups = array();
        $ids = array();

        $where = $this->buildWhere($filters);
        
        $sql = "SELECT 
        id_product, id_options
        FROM tb_products
        WHERE ".implode(' AND ', $where);
        $sql = $this->db->prepare($sql);

        $this->bindWhere($filters, $sql);
        $sql->execute();

        if($sql->rowCount() > 0){
            foreach($sql->fetchAll() as $product) {  // Varre cada produto
                $ops = explode(",", $product['id_options']); // Pego o id_options com separação das virgulas
                $ids[] = $product['id_product']; // Pega o id do produto e inputa no array ids[]
                foreach($ops as $op) {  // Varre as opções lidas do produto lido nesse giro de loop
                    if(!in_array($op, $groups)) { // Se não tiver adiciona 
                        $groups[] = $op;  // Criei array groups com todas as options
                    }
                } // Fim foreach $ops
            } // Fim foreach ferchAll
        } // Fim if de rowCount()
        
        //return $groups;   // Retorna para Filters.php o array com as opções

        // Baseado nos $groups e $ids a função getAvailableValuesFromOptions vai procurar as opções disponíveis
        $options = $this->getAvailableValuesFromOptions($groups, $ids);

        return $options;

    } // Fim do método getAvailableOptions


    public function getAvailableValuesFromOptions($groups, $ids){
        $array = array();
        $options = new Options();
        foreach($groups as $op) {
            $array[$op] = array(
                'name' => $options->getName($op),
                'options' => array()
            );
        }
        
        $sql = "SELECT
        ds_value, 
        id_option,
        COUNT(id_option) as c
        FROM tb_products_options
        WHERE 
        id_option IN ('".implode(" ',' ", $groups)."') AND
        id_product IN ('".implode(" ',' ", $ids)."')
        GROUP BY ds_value ORDER BY id_option";

        $sql = $this->db->query($sql);
        if($sql->rowCount() > 0) {
            foreach($sql->fetchAll() as $ops) {

                $array[$ops['id_option']]['options'][] = 
                    array(
                        'id'=>$ops['id_option'],
                        'value'=>$ops['ds_value'],
                        'count'=>$ops['c']
                    );
            }
        }

        return $array;
    } // Fim método getAvailableValuesFromOptions

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
        
        $sql = "SELECT
        vl_price
        FROM tb_products 
        ORDER BY vl_price DESC
        LIMIT 1";
        $sql = $this->db->prepare($sql);

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

    public function getList($offset = 0, $limit = 3, $filters = array(), $random = false) {  // $offset pnto de partida para paginação / $limit = 10 -> Quantidade de items que aparecerão na tela
        $array = array();

        $orderBySQL = '';
        if($random == true) {
            $orderBySQL = "ORDER BY RAND()";
        }

        if(!empty($filters['toprated'])){
            $orderBySQL = "ORDER BY qt_rating DESC";
        }

        $where = $this->buildWhere($filters);

        // A query abaixo faz consulta para buscar nome da marca e nome da categoria 
        $sql = "SELECT *,
            ( select tb_brands.nm_brand from tb_brands where tb_brands.id_brand = tb_products.id_brand ) as brand_name,
            ( select tb_categories.nm_categories from tb_categories where tb_categories.id_categories = tb_products.id_category) as category_name 
        FROM 
        tb_products 
        WHERE ".implode(' AND ', $where)."
        ".$orderBySQL."
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

        if(!empty($filters['brand'])){
            $where[] = "id_brand IN ('".implode("','",$filters['brand'])."')";
        }

        if(!empty($filters['star'])){
            $where[] = "qt_rating IN ('".implode("','",$filters['star'])."')";
        }

        if(!empty($filters['sale'])){
            $where[] = "ic_sale  = '1' ";
        }

        if(!empty($filters['featured'])){
            $where[] = "ic_featured  = '1' ";
        }

        if(!empty($filters['options'])){
            $where[] = "id_product IN 
            (select id_product from tb_products_options 
            where tb_products_options.ds_value IN 
            ('".implode("','",$filters['options'])."') )";
        }

        if(!empty($filters['slider0'])){
            $where[] = "vl_price >= :slider0" ;
        }

        if(!empty($filters['slider1'])){
            $where[] = "vl_price <= :slider1" ;
        }

        if(!empty($filters['searchTerm'])){
            $where[] = "nm_product LIKE :searchTerm";
        }

        return $where;
    }

    private function bindWhere($filters, &$sql) {
        if(!empty($filters['category'])){ // Preenchendo statement
            $sql->bindValue(":id_category", $filters['category']);
        }

        if(!empty($filters['slider0'])) {
            $sql->bindValue(":slider0", $filters['slider0']);
        }

        if(!empty($filters['slider1'])) {
            $sql->bindValue(":slider1", $filters['slider1']);
        }

        if(!empty($filters['searchTerm'])){
            $sql->bindValue(":searchTerm", '%'.$filters['searchTerm'].'%');
        }

    }

    public function getProductInfo($id){
        $array = array();

        if(!empty($id)){
            
            // $sql = "SELECT 
            // * ,
            // ( select tb_brands.nm_brand from tb_brands where tb_brands.id_brand = tb_products.id_brand ) as brand_name
            // FROM tb_products WHERE id_product = :id";

            $sql = "SELECT p.id_product, p.nm_product, p.ds_product, p.vl_price, p.vl_price_from, p.qt_rating, b.nm_brand as brand_name
            FROM tb_products p
            JOIN tb_brands b ON p.id_brand = b.id_brand
            WHERE p.id_product = :id";

            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id", $id);
            $sql->execute();

            if($sql->rowCount() > 0){

                $array = $sql->fetch();

            }
        }

        return $array;
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