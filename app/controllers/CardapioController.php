<?php 

class CardapioController extends Controller{

    private $produtoModel;

    public function __construct(){
        $this->produtoModel = new Produto();
    }
    public function index(){
        $dados = array();
        $dados['titulo'] = 'Café Divino | Cardápio';

        $agua = $this->produtoModel->getAgua();
        $dados['agua'] = $agua;

        $this->carregarViews('cardapio', $dados);
        
    }
}