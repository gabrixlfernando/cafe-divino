<?php
class Login extends Model {
    public function verificarFunc($email, $senha) {
        $sql = "SELECT * FROM funcionario WHERE email_funcionario = :email AND senha_funcionario = :senha AND status_funcionario = 'ATIVO'";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':senha', $senha);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}