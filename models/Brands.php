<?php

class Brands extends model{ // Classe respónsavel pelas marcas

    public function getList() {
        $array = array();

        $sql = "SELECT * FROM tb_brands";
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

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