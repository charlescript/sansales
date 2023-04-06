<?php
class Categories extends model {

    /* "getList()" é responsável por buscar todas as categorias do banco de dados
        e organizar em um array. */
    public function getList() {
        $array = array();

        $sql = "SELECT * FROM tb_categories ORDER BY cd_sub_categories DESC";
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0) {
            foreach($sql->fetchAll() as $item){
                $item['subs'] = array();
                $array[$item['id_categories']] = $item;
            }

            while($this->stillNeed($array)) {
                $this->organizeCategory($array);
            }
            

        }

        // echo '<pre>';
        // print_r($array);
        // exit;
        return $array;
    }


    public function getCategoryTree($id) {
        $array = array();

        $haveChild = true;

        while($haveChild){

            $sql = "SELECT * FROM tb_categories WHERE id_categories = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id", $id);
            $sql->execute();
            if($sql->rowCount() > 0){
                $sql = $sql->fetch();
                $array[] = $sql;

                if(!empty($sql['cd_sub_categories'])){
                    $id = $sql['cd_sub_categories'];
                } else {
                    $haveChild = false;
                }
            }
        }

        $array = array_reverse($array);

        return $array;
    }  // Fim getCategoryTree


    public function getCategoryName($id){
        $sql = "SELECT nm_categories FROM tb_categories WHERE id_categories = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id",$id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $sql = $sql->fetch();
            return $sql['nm_categories'];
        }
    } // Fim getCategoryName


    /* organizeCategory() é chamada várias vezes até que todas as 
    categorias estejam organizadas em uma árvore. */ 
    private function organizeCategory(&$array){
        foreach($array as $id => $item) {
            if(isset($array[$item['cd_sub_categories']])){
                $array[$item['cd_sub_categories']]['subs'][$item['id_categories']] = $item;
                unset($array[$id]);
                break;
            }
        }
    }

    // stillNeed() verifica se ainda há categorias que precisam ser organizadas.
    private function stillNeed($array){
        foreach($array as $item) {
            if(!empty($item['cd_sub_categories'])){
                return true;
            }
        }
        return false;
    }

}

?>

<!-- Cada categoria possui um ID, um nome e um "cd_sub_categories", 
que indica o ID da categoria pai. Essa estrutura de dados é usada para 
criar a árvore de categorias, onde as categorias pai são os nós da árvore 
e as categorias filhas são os ramos. O código percorre todas as categorias
 e, para cada categoria que possui um "cd_sub_categories", procura a categoria
  pai correspondente e adiciona a categoria atual como uma filha. O processo é
   repetido até que todas as categorias sejam organizadas em uma árvore completa. No final, a função retorna o array com a árvore de categorias organizada. -->