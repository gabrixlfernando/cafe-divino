<?php 

class HomeController extends Controller{
    public function index(){
        $dados = array();
        $dados['titulo'] = 'Café Divino | Início';

        $this->carregarViews('home', $dados);
        
    }
}