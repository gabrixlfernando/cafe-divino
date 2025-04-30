<?php 
class AdminController extends Controller {
    public function index() {
        // Verifica se está logado como funcionário
        if(!isset($_SESSION['usuario']) || $_SESSION['tipo'] !== 'funcionario') {
            header("Location:" . BASE_URL . "login");
            exit;
        }
        
        $dados = array();
        $dados['titulo'] = 'Café Divino | Dashboard';    

        // Passa os dados do usuário logado para a view
        $dados['usuario'] = $_SESSION['usuario'];
        
        $produto = new Produto();
        $depoimento = new Depoimento();
        $funcionario = new Funcionario();
        $contato = new Contato();

        $dados['totalProdutos'] = $produto->getTotalProdutos();
        $dados['totalDepoimentos'] = $depoimento->getTotalDepoimentos();
        $dados['totalFuncionarios'] = $funcionario->getTotalFuncionarios();
        $dados['totalContatos'] = $contato->getTotalContatos();

        $this->carregarViews('admin/index', $dados);
    }
}