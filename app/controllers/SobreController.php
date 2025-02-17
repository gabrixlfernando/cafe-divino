<?php 

class SobreController extends Controller{
    public function index(){
        $dados = array();
        $dados['titulo'] = 'Café Divino | Sobre';

        $this->carregarViews('sobre', $dados);
        
    }
}