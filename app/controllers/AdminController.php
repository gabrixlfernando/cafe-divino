<?php 

class AdminController extends Controller{
    public function index(){

        // if(!isset($_SESSION['usuario']) || isset($_SESSION['tipo'])){
        //     header("Location:" . BASE_URL);
        //     exit;
        // }
        $dados = array();
        $dados['titulo'] = 'Café Divino | Dashboard';    
        
        
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