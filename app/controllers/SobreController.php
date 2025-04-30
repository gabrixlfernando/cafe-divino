<?php 

class SobreController extends Controller{
    
    private $depoimentoModel;

    public function __construct(){
        $this->depoimentoModel = new Depoimento();
    }
    public function index(){
        $dados = array();
        $dados['titulo'] = 'Café Divino | Sobre';

        $depoimento = $this->depoimentoModel->getDepoimentos();
        $dados['depoimento'] = $depoimento;

        $this->carregarViews('sobre', $dados);
        
    }
}