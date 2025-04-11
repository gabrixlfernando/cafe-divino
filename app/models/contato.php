<?php

class Contato extends Model
{
 public function getTodosContato(){
    $sql = "SELECT * FROM contato ORDER BY id_contato DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
 }
}