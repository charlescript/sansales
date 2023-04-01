<?php

class Brands extends model{ // Classe respónsavel pelas marcas

    public function getNameById($id){

        $sql = "SELECT nm_brand FROM TB_BRANDS WHERE id_brand = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            
            $data = $sql->fetch();
            
            return $data['nm_brand'];
        } else {
            return '';
        }
    }
}