<?php

class Depoimento extends Model
{
    public function getDepoimentos()
    {
        $sql = "SELECT * FROM depoimento WHERE status_depoimento = 'ATIVO'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getAllDepoimentos()
    {
        $sql = "SELECT * FROM depoimento ORDER BY id_depoimento DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getDepoimentosFiltrados($status = null, $pesquisa = '')
{
    $sql = "SELECT * FROM depoimento WHERE 1=1";
    
    // Adiciona condição para status se não for null
    if ($status !== null) {
        $sql .= " AND status_depoimento = :status";
    }
    
    // Adiciona condição para pesquisa se não estiver vazia
    if (!empty($pesquisa)) {
        $sql .= " AND (nome_depoimento LIKE :pesquisa 
                  OR mens_depoimento LIKE :pesquisa 
                  OR profissao_depoimento LIKE :pesquisa)";
    }
    
    $sql .= " ORDER BY id_depoimento DESC";
    
    $stmt = $this->db->prepare($sql);
    
    if ($status !== null) {
        $stmt->bindValue(':status', $status);
    }
    
    if (!empty($pesquisa)) {
        $stmt->bindValue(':pesquisa', '%' . $pesquisa . '%');
    }
    
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
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

    public function inserir($dados)
{
    $sql = "INSERT INTO depoimento (
                nome_depoimento, profissao_depoimento, mens_depoimento,
                foto_depoimento, alt_depoimento, status_depoimento, datahora_depoimento
            ) VALUES (
                :nome, :profissao, :mensagem,
                :foto, :alt, :status, :datahora
            )";

    $stmt = $this->db->prepare($sql);

    $stmt->bindValue(':nome', $dados['nome_depoimento']);
    $stmt->bindValue(':profissao', $dados['profissao_depoimento']);
    $stmt->bindValue(':mensagem', $dados['mens_depoimento']);
    $stmt->bindValue(':foto', $dados['foto_depoimento']);
    $stmt->bindValue(':alt', $dados['alt_depoimento']);
    $stmt->bindValue(':status', $dados['status_depoimento']);
    $stmt->bindValue(':datahora', $dados['datahora_depoimento']);

    return $stmt->execute();
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

    public function getTotalDepoimentos()
    {
        $sql = "SELECT COUNT(*) as total FROM depoimento WHERE status_depoimento = 'ATIVO'";
        $sql = $this->db->query($sql);
        $row = $sql->fetch();
        return $row['total'];
    }

    public function getUltimosDepoimentos($limite = 5)
{
    $sql = "SELECT id_depoimento, nome_depoimento, mens_depoimento, foto_depoimento,
                   DATE_FORMAT(datahora_depoimento, '%d/%m/%Y') as data_formatada
            FROM depoimento
            ORDER BY datahora_depoimento DESC
            LIMIT :limite";
    
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(':limite', (int)$limite, PDO::PARAM_INT);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function getDepoimentosPorMes($mesAno)
{
    $sql = "SELECT COUNT(*) as total
            FROM depoimento
            WHERE DATE_FORMAT(datahora_depoimento, '%Y-%m') = :mesAno";
    
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(':mesAno', $mesAno);
    $stmt->execute();
    
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    return $resultado['total'] ?? 0;
}
}
