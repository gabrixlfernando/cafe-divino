<?php 

class FuncionarioController extends Controller{
    private $funcionarioModel;

    public function __construct(){
     $this->funcionarioModel = new Funcionario();
 
 }


 public function listar(){
    $dados = array();
    
    $dados['conteudo'] = 'admin/funcionario/listar';

    $dados['funcionarios'] = $this->funcionarioModel->getTodosFuncionario();
    
    $this->carregarViews('admin/index', $dados);

}
}