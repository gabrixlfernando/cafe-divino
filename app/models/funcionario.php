<?php

class Funcionario extends Model
{
 public function getTodosFuncionario(){
    $sql = "SELECT * FROM funcionario ORDER BY id_funcionario DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
 }
}