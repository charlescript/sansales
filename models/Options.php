<?php
class Options extends model {
    
    public function getName($id){
        $sql = "SELECT nm_option FROM tb_options WHERE id_option = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $sql = $sql->fetch();
            return $sql['nm_option'];
        }
    }
}