<?php 

class CardapioController extends Controller{
    public function index(){
        $dados = array();
        $dados['titulo'] = 'Café Divino | Cardápio';

        $this->carregarViews('cardapio', $dados);
        
    }
}