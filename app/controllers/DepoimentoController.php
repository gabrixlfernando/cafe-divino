<?php

class DepoimentoController extends Controller
{
    private $depoimentoModel;

    public function __construct()
    {
        $this->depoimentoModel = new Depoimento();
    }


    public function listar(){
        $dados = array();
        $dados['conteudo'] = 'admin/depoimento/listar';

        $dados['depoimentos'] = $this->depoimentoModel->getAllDepoimentos();
        
        $this->carregarViews('admin/index', $dados);

    }
}
