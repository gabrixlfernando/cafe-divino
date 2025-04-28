<?php

class DepoimentoController extends Controller
{
    private $depoimentoModel;
    private $contatoModel;
   private $funcionarioModel;
    private $produtoModel;
    

    public function __construct()
    {
        $this->funcionarioModel = new Funcionario();
        $this->produtoModel = new produto();
        $this->depoimentoModel = new Depoimento();
        $this->contatoModel = new Contato();
    }


    public function listar(){
        $dados = array();
        $dados['conteudo'] = 'admin/depoimento/listar';

        $dados['depoimentos'] = $this->depoimentoModel->getAllDepoimentos();

        $dados['totalProdutos'] = $this->produtoModel->getTotalProdutos();
        $dados['totalDepoimentos'] = $this->depoimentoModel->getTotalDepoimentos();
        $dados['totalFuncionarios'] = $this->funcionarioModel->getTotalFuncionarios();
        $dados['totalContatos'] = $this->contatoModel->getTotalContatos();
        
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
