<?php

class Funcionario extends Model
{
    public function getTodosFuncionario()
    {
        $sql = "SELECT * FROM funcionario  WHERE status_funcionario = 'ATIVO' ORDER BY id_funcionario DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getDadosFuncionario($id)
    {

        $sql = "SELECT * FROM funcionario WHERE id_funcionario = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $dadosFuncionario = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$dadosFuncionario) {
            // Caso o Funcionario não seja encontrado
            return null;
        }

        return $dadosFuncionario;
    }


    public function addFuncionario($dados)
    {
        $sql = "INSERT INTO funcionario 
    (nome_funcionario, cpf_funcionario, endereco_funcionario, bairro_funcionario, 
     cidade_funcionario, estado_funcionario, telefone_funcionario, email_funcionario, 
     senha_funcionario, data_cad_funcionario, status_funcionario)
    VALUES 
    (:nome_funcionario, :cpf_funcionario, :endereco_funcionario, :bairro_funcionario, 
     :cidade_funcionario, :estado_funcionario, :telefone_funcionario, :email_funcionario, 
     :senha_funcionario, :data_cad_funcionario, :status_funcionario)";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':nome_funcionario', $dados['nome_funcionario']);
        $stmt->bindValue(':cpf_funcionario', $dados['cpf_funcionario']);
        $stmt->bindValue(':endereco_funcionario', $dados['endereco_funcionario']);
        $stmt->bindValue(':bairro_funcionario', $dados['bairro_funcionario']);
        $stmt->bindValue(':cidade_funcionario', $dados['cidade_funcionario']);
        $stmt->bindValue(':estado_funcionario', $dados['estado_funcionario']);
        $stmt->bindValue(':telefone_funcionario', $dados['telefone_funcionario']);
        $stmt->bindValue(':email_funcionario', $dados['email_funcionario']);
        $stmt->bindValue(':senha_funcionario', $dados['senha_funcionario']); // deve estar já com hash
        $stmt->bindValue(':data_cad_funcionario', $dados['data_cad_funcionario']);
        $stmt->bindValue(':status_funcionario', $dados['status_funcionario']);

        return $stmt->execute();
    }

    public function editarFuncionario($dados)
    {
        $sql = "UPDATE funcionario SET
                nome_funcionario     = :nome_funcionario,
                cpf_funcionario      = :cpf_funcionario,
                endereco_funcionario = :endereco_funcionario,
                bairro_funcionario   = :bairro_funcionario,
                cidade_funcionario   = :cidade_funcionario,
                estado_funcionario   = :estado_funcionario,
                telefone_funcionario = :telefone_funcionario,
                email_funcionario    = :email_funcionario,
                senha_funcionario    = :senha_funcionario,
                status_funcionario   = :status_funcionario
            WHERE id_funcionario = :id_funcionario";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':id_funcionario', $dados['id_funcionario'], PDO::PARAM_INT);
        $stmt->bindValue(':nome_funcionario', $dados['nome_funcionario']);
        $stmt->bindValue(':cpf_funcionario', $dados['cpf_funcionario']);
        $stmt->bindValue(':endereco_funcionario', $dados['endereco_funcionario']);
        $stmt->bindValue(':bairro_funcionario', $dados['bairro_funcionario']);
        $stmt->bindValue(':cidade_funcionario', $dados['cidade_funcionario']);
        $stmt->bindValue(':estado_funcionario', $dados['estado_funcionario']);
        $stmt->bindValue(':telefone_funcionario', $dados['telefone_funcionario']);
        $stmt->bindValue(':email_funcionario', $dados['email_funcionario']);
        $stmt->bindValue(':senha_funcionario', $dados['senha_funcionario']);
        $stmt->bindValue(':status_funcionario', $dados['status_funcionario']);

        return $stmt->execute();
    }

    public function desativarFuncionario($id)
    {
        $sql = "UPDATE funcionario SET status_funcionario = 'DESATIVADO' WHERE id_funcionario = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    public function getTotalFuncionarios() {
        $sql = "SELECT COUNT(*) as total FROM funcionario";
        $sql = $this->db->query($sql);
        $row = $sql->fetch();
        return $row['total'];
    }
}
