<?php 
class LoginController extends Controller {
    public function index() {
        // Se já estiver logado, redireciona para o admin
        if(isset($_SESSION['usuario']) && isset($_SESSION['tipo']) && $_SESSION['tipo'] === 'funcionario') {
            header("Location:" . BASE_URL . "admin");
            exit;
        }
        
        // Carrega a view de login
        $this->carregarViews('login/index');
    }

    public function autenticar() {
        $email = $_POST['email'] ?? $_POST['username']; // Compatível com ambos forms
        $senha = $_POST['senha'] ?? $_POST['password']; // Compatível com ambos forms

        $loginModel = new Login();

        // Verificar apenas funcionário (removida a parte de cliente)
        $func = $loginModel->verificarFunc($email, $senha);

        if($func) {
            $_SESSION['usuario'] = $func;
            $_SESSION['tipo'] = 'funcionario';
            header("Location:" . BASE_URL . "admin");
            exit;
        }

        $_SESSION['erro_login'] = 'Email ou Senha inválidos';
        header("Location:" . BASE_URL . "login");
        exit;
    }

    public function sair() {
        session_destroy();
        header("Location:" . BASE_URL . "login");
        exit;
    }
}