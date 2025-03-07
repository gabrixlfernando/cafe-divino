<?php 

class Depoimento extends Model{
    public function getAllDepoimentos() {
        $sql = "SELECT * FROM depoimento WHERE status_depoimento = 'ATIVO'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}