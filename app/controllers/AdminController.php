<?php 

class AdminController extends Controller{
    public function index(){

        // if(!isset($_SESSION['usuario']) || isset($_SESSION['tipo'])){
        //     header("Location:" . BASE_URL);
        //     exit;
        // }
        $dados = array();
        $dados['titulo'] = 'Café Divino | Dashboard';     

        $this->carregarViews('admin/index', $dados);
        
    }
}