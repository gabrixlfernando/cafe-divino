<?php 

class Produto extends Model{

    public function getAllProdutos() {
        $sql = "SELECT * FROM produto WHERE status_produto = 'ATIVO'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

     // Método para listar os últimos 4 produtos cadastrados (novidades)
    public function getNovidades() {
        $sql = "SELECT * FROM produto WHERE status_produto = 'ATIVO' ORDER BY id_produto DESC LIMIT 4";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

     // Método para listar os produtos da categoria 'Café'
     public function getCafe() {
        $sql = "SELECT * FROM produto WHERE categoria_produto = 'CAFÉ' AND status_produto = 'ATIVO'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Método para listar os produtos da categoria 'Café Gelado'
    public function getCafeGelado() {
        $sql = "SELECT * FROM produto WHERE categoria_produto = 'CAFÉ GELADO' AND status_produto = 'ATIVO'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Método para listar os produtos da categoria 'Smoothies'
    public function getSmoothies() {
        $sql = "SELECT * FROM produto WHERE categoria_produto = 'SMOOTHIES' AND status_produto = 'ATIVO'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Método para listar os produtos da categoria 'Pães'
    public function getPaes() {
        $sql = "SELECT * FROM produto WHERE categoria_produto = 'PÃES' AND status_produto = 'ATIVO'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Método para listar os produtos da categoria 'Doces'
    public function getDoces() {
        $sql = "SELECT * FROM produto WHERE categoria_produto = 'DOCES' AND status_produto = 'ATIVO'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Método para listar os produtos da categoria 'Chá'
    public function getCha() {
        $sql = "SELECT * FROM produto WHERE categoria_produto = 'CHÁ' AND status_produto = 'ATIVO'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Método para listar os produtos da categoria 'Chá Gelado'
    public function getChaGelado() {
        $sql = "SELECT * FROM produto WHERE categoria_produto = 'CHÁ GELADO' AND status_produto = 'ATIVO'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Método para listar os produtos da categoria 'Shakes'
    public function getShakes() {
        $sql = "SELECT * FROM produto WHERE categoria_produto = 'SHAKES' AND status_produto = 'ATIVO'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Método para listar os produtos da categoria 'Bebidas Veganas'
    public function getBebidasVegan() {
        $sql = "SELECT * FROM produto WHERE categoria_produto = 'BEBIDAS VEGANAS' AND status_produto = 'ATIVO'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Método para listar os produtos da categoria 'Água'
    public function getAgua() {
        $sql = "SELECT * FROM produto WHERE categoria_produto = 'ÁGUA' AND status_produto = 'ATIVO';";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }


}