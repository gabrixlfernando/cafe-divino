<?php 

class Depoimento extends Model{
    public function getAllDepoimentos() {
        $sql = "SELECT * FROM depoimento ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getDadosDepoimento($id)
    {

        $sql = "SELECT * FROM depoimento WHERE id_depoimento = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $dadosDepoimento = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$dadosDepoimento) {
            // Caso o Depoimento não seja encontrado
            return null;
        }

        return $dadosDepoimento;
    }

    public function ativarDepoimento($id)
    {
        $sql = "UPDATE depoimento SET status_depoimento = 'ATIVO' WHERE id_depoimento = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function desativarDepoimento($id)
    {
        $sql = "UPDATE depoimento SET status_depoimento = 'DESATIVADO' WHERE id_depoimento = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

}