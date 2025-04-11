<?php 

class ContatoController extends Controller{
   
   private $contatoModel;

   public function __construct(){
    $this->contatoModel = new Contato();

}
    public function index(){
        $dados = array();
        $dados['titulo'] = 'Café Divino | Contato';

        $this->carregarViews('contato', $dados);
        
    }

    //##############################################################
    // BACK-END DASHBOARD CONTATO
    //##############################################################

   

    public function listar(){
        $dados = array();
        $dados['conteudo'] = 'admin/contato/listar';

        $dados['contatos'] = $this->contatoModel->getTodosContato();
        // var_dump($dados);
        $this->carregarViews('admin/index', $dados);

    }
}