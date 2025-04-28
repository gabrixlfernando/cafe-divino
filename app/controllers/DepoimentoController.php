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

    public function ativar($id = null)
    {
        header('Content-Type: application/json');

        if ($id === null) {
            http_response_code(400);
            echo json_encode(['sucesso' => false, 'mensagem' => 'ID inválido']);
            exit;
        }

        $ativar = $this->depoimentoModel->ativarDepoimento($id);

        if ($ativar) {
            $_SESSION['mensagem'] = 'Depoimento ativado com sucesso';
            $_SESSION['tipo-msg'] = 'sucesso';

            echo json_encode(['sucesso' => true]);
        } else {
            echo json_encode(['sucesso' => false, 'mensagem' => 'Falha ao ativar o Depoimento']);
        }
    }

    public function desativar($id = null)
    {
        header('Content-Type: application/json');

        if ($id === null) {
            http_response_code(400);
            echo json_encode(['sucesso' => false, 'mensagem' => 'ID inválido']);
            exit;
        }

        $desativar = $this->depoimentoModel->desativarDepoimento($id);

        if ($desativar) {
            $_SESSION['mensagem'] = 'Depoimento desativado com sucesso';
            $_SESSION['tipo-msg'] = 'sucesso';

            echo json_encode(['sucesso' => true]);
        } else {
            echo json_encode(['sucesso' => false, 'mensagem' => 'Falha ao desativar o Depoimento']);
        }
    }
}
