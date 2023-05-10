<?php 

class Rates extends model {

    public function getRates($id, $qt){
        $array = array();

        $sql = "SELECT *,
        (select tb_users.nm_user from tb_users where tb_users.id_user = tb_rates.id_user) as user_name
        FROM tb_rates
        WHERE id_product = :id
        ORDER BY dt_rate 
        DESC LIMIT :qt" ;
        

        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->bindValue(":qt", intval($qt), PDO::PARAM_INT);
        $sql->execute();

        if($sql->rowCount()){
            $array = $sql->fetchAll();
        }
        
        return $array;
    }
}