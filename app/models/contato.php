<?php

class Contato extends Model
{
    public function getTodosContato()
    {
        $sql = "SELECT * FROM contato WHERE status_contato = 'AGUARDANDO' ORDER BY id_contato DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getContatosPorStatus($status)
{
    $sql = "SELECT * FROM contato WHERE status_contato = :status";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':status', $status);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

    public function salvarContato($dados)
    {
        try {
            $sql = "INSERT INTO contato (nome_contato, email_contato, assunto_contato, mens_contato, lido_contato, status_contato, datahora_contato)
                VALUES (:nome, :email, :assunto, :mensagem, 0, 'AGUARDANDO', NOW())";

            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':nome', $dados['nome']);
            $stmt->bindParam(':email', $dados['email']);
            $stmt->bindParam(':assunto', $dados['assunto']);
            $stmt->bindParam(':mensagem', $dados['mensagem']);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            error_log('Erro ao salvar contato: ' . $e->getMessage());
            return false;
        }
    }


    public function getDadosContato($id)
    {

        $sql = "SELECT * FROM contato WHERE id_contato = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $dadosContato = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$dadosContato) {
            // Caso o Contato não seja encontrado
            return null;
        }

        return $dadosContato;
    }


    public function atualizarStatusRespondido($idContato)
    {
        $sql = "UPDATE contato SET status_contato = 'RESPONDIDO' WHERE id_contato = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $idContato, \PDO::PARAM_INT);
        $stmt->execute();
    }

    public function desativarContato($id)
    {
        $sql = "UPDATE contato SET status_contato = 'DESATIVADO' WHERE id_contato = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getTotalContatos()
    {
        $sql = "SELECT COUNT(*) as total FROM contato WHERE status_contato = 'AGUARDANDO'";
        $sql = $this->db->query($sql);
        $row = $sql->fetch();
        return $row['total'];
    }
}
