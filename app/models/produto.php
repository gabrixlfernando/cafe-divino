<?php

class Produto extends Model
{

    public function getAllProdutos()
    {
        $sql = "SELECT * FROM produto WHERE status_produto = 'ATIVO' ORDER BY id_produto DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Método para listar os últimos 4 produtos cadastrados (novidades)
    public function getNovidades()
    {
        $sql = "SELECT * FROM produto WHERE status_produto = 'ATIVO' ORDER BY id_produto DESC LIMIT 4";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Método para listar os produtos da categoria 'Café'
    public function getCafe()
    {
        $sql = "SELECT * FROM produto WHERE categoria_produto = 'CAFÉ' AND status_produto = 'ATIVO'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Método para listar os produtos da categoria 'Café Gelado'
    public function getCafeGelado()
    {
        $sql = "SELECT * FROM produto WHERE categoria_produto = 'CAFÉ GELADO' AND status_produto = 'ATIVO'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Método para listar os produtos da categoria 'Smoothies'
    public function getSmoothies()
    {
        $sql = "SELECT * FROM produto WHERE categoria_produto = 'SMOOTHIES' AND status_produto = 'ATIVO'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Método para listar os produtos da categoria 'Pães'
    public function getPaes()
    {
        $sql = "SELECT * FROM produto WHERE categoria_produto = 'PÃES' AND status_produto = 'ATIVO'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Método para listar os produtos da categoria 'Doces'
    public function getDoces()
    {
        $sql = "SELECT * FROM produto WHERE categoria_produto = 'DOCES' AND status_produto = 'ATIVO'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Método para listar os produtos da categoria 'Chá'
    public function getCha()
    {
        $sql = "SELECT * FROM produto WHERE categoria_produto = 'CHÁ' AND status_produto = 'ATIVO'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Método para listar os produtos da categoria 'Chá Gelado'
    public function getChaGelado()
    {
        $sql = "SELECT * FROM produto WHERE categoria_produto = 'CHÁ GELADO' AND status_produto = 'ATIVO'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Método para listar os produtos da categoria 'Shakes'
    public function getShakes()
    {
        $sql = "SELECT * FROM produto WHERE categoria_produto = 'SHAKES' AND status_produto = 'ATIVO'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Método para listar os produtos da categoria 'Bebidas Veganas'
    public function getBebidasVegan()
    {
        $sql = "SELECT * FROM produto WHERE categoria_produto = 'BEBIDAS VEGANAS' AND status_produto = 'ATIVO'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Método para listar os produtos da categoria 'Água'
    public function getAgua()
    {
        $sql = "SELECT * FROM produto WHERE categoria_produto = 'ÁGUA' AND status_produto = 'ATIVO';";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getDadosProduto($id)
    {

        $sql = "SELECT * FROM produto WHERE id_produto = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $dadosProduto = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$dadosProduto) {
            // Caso o produto não seja encontrado
            return null;
        }

        return $dadosProduto;
    }


    public function addProduto($dados)
    {
        $sql = "INSERT INTO produto 
    (nome_produto, descricao_produto, foto_produto, alt_produto, 
    categoria_produto, ml_produto, valor_produto, status_produto) 
    VALUES 
    (:nome_produto, :descricao_produto, :foto_produto, :alt_produto, 
    :categoria_produto, :ml_produto, :valor_produto, :status_produto)";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':nome_produto', $dados['nome_produto']);
        $stmt->bindValue(':descricao_produto', $dados['descricao_produto']);
        $stmt->bindValue(':foto_produto', $dados['foto_produto']);
        $stmt->bindValue(':alt_produto', $dados['alt_produto']);
        $stmt->bindValue(':categoria_produto', $dados['categoria_produto']);
        $stmt->bindValue(':ml_produto', $dados['ml_produto']);
        $stmt->bindValue(':valor_produto', $dados['valor_produto']);
        $stmt->bindValue(':status_produto', $dados['status_produto']);

        return $stmt->execute();
    }

    public function editarProduto($dados)
    {
        $sql = "UPDATE produto SET
                nome_produto = :nome_produto,
                descricao_produto = :descricao_produto,
                foto_produto = :foto_produto,
                alt_produto = :alt_produto,
                categoria_produto = :categoria_produto,
                ml_produto = :ml_produto,
                valor_produto = :valor_produto,
                status_produto = :status_produto
            WHERE id_produto = :id_produto";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':id_produto', $dados['id_produto'], PDO::PARAM_INT);
        $stmt->bindValue(':nome_produto', $dados['nome_produto']);
        $stmt->bindValue(':descricao_produto', $dados['descricao_produto']);
        $stmt->bindValue(':foto_produto', $dados['foto_produto']);
        $stmt->bindValue(':alt_produto', $dados['alt_produto']);
        $stmt->bindValue(':categoria_produto', $dados['categoria_produto']);
        $stmt->bindValue(':ml_produto', $dados['ml_produto'], PDO::PARAM_INT);
        $stmt->bindValue(':valor_produto', $dados['valor_produto']);
        $stmt->bindValue(':status_produto', $dados['status_produto']);

        return $stmt->execute();
    }

    public function desativarProduto($id)
    {
        $sql = "UPDATE produto SET status_produto = 'DESATIVADO' WHERE id_produto = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
