<?php 

class ContatoController extends Controller{
    public function index(){
        $dados = array();
        $dados['titulo'] = 'Café Divino | Contato';

        $this->carregarViews('contato', $dados);
        
    }
}