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
        $this->produtoModel = new Produto();
        $this->depoimentoModel = new Depoimento();
        $this->contatoModel = new Contato();
    }

    public function index()
    {
        $dados = array();
        $dados['titulo'] = 'Café Divino | Depoimento';

        $this->carregarViews('depoimento', $dados);
    }


    public function listar()
    {
         // Verifica se está logado como funcionário
         if(!isset($_SESSION['usuario']) || $_SESSION['tipo'] !== 'funcionario') {
            header("Location:" . BASE_URL . "login");
            exit;
        }
        $dados = array();
        $dados['conteudo'] = 'admin/depoimento/listar';

        $dados['depoimentos'] = $this->depoimentoModel->getAllDepoimentos();

        $dados['totalProdutos'] = $this->produtoModel->getTotalProdutos();
        $dados['totalDepoimentos'] = $this->depoimentoModel->getTotalDepoimentos();
        $dados['totalFuncionarios'] = $this->funcionarioModel->getTotalFuncionarios();
        $dados['totalContatos'] = $this->contatoModel->getTotalContatos();

        // Passa os dados do usuário logado para a view
        $dados['usuario'] = $_SESSION['usuario'];

        $this->carregarViews('admin/index', $dados);
    }

    public function filtrarDepoimentos()
    {
        $status = $_POST['status'] ?? 'TODOS';
        $pesquisa = $_POST['pesquisa'] ?? '';
        
        if ($status === 'TODOS') {
            $depoimentos = $this->depoimentoModel->getDepoimentosFiltrados(null, $pesquisa);
        } else {
            $depoimentos = $this->depoimentoModel->getDepoimentosFiltrados($status, $pesquisa);
        }
    
        echo json_encode($depoimentos);
    }



    public function salvar()
    {
        header('Content-Type: application/json; charset=utf-8');
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Apenas trim para limpar espaços e manter os acentos
            $nome = trim($_POST['nome_depoimento'] ?? '');
            $profissao = trim($_POST['profissao_depoimento'] ?? '');$profissao = trim($_POST['profissao_depoimento'] ?? '');
            // Coloca a primeira letra de cada palavra em maiúsculo
            $profissao = ucwords(strtolower($profissao));
            $mensagem = trim($_POST['mens_depoimento'] ?? '');
    
            // Nome todo em maiúsculo com suporte a UTF-8
            $nome = mb_strtoupper($nome, 'UTF-8');
    
            $alt = $nome;
            $status = 'DESATIVADO';
            $dataHora = date('Y-m-d H:i:s');
    
            $arquivo = null;
            if (isset($_FILES['foto_depoimento']) && $_FILES['foto_depoimento']['error'] === 0) {
                $arquivo = $this->uploadFotoCliente($_FILES['foto_depoimento'], $nome);
            }
    
            if (!$arquivo) {
                echo json_encode(['status' => 'error', 'message' => 'Erro ao fazer upload da imagem.'], JSON_UNESCAPED_UNICODE);
                exit;
            }
    
            $dadosDepoimento = [
                'nome_depoimento'      => $nome,
                'profissao_depoimento' => $profissao,
                'mens_depoimento'      => $mensagem,
                'foto_depoimento'      => $arquivo,
                'alt_depoimento'       => $alt,
                'status_depoimento'    => $status,
                'datahora_depoimento'  => $dataHora
            ];
    
            $inserido = $this->depoimentoModel->inserir($dadosDepoimento);
    
            if ($inserido) {
                echo json_encode(['status' => 'success', 'message' => 'Depoimento enviado com sucesso!'], JSON_UNESCAPED_UNICODE);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Erro ao salvar no banco.'], JSON_UNESCAPED_UNICODE);
            }
    
            exit;
        }
    
        echo json_encode(['status' => 'error', 'message' => 'Requisição inválida.'], JSON_UNESCAPED_UNICODE);
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

    public function uploadFotoCliente($file, $nome)
    {
        $dir = '../public/uploads/clientes/';

        if (!file_exists($dir)) {
            mkdir($dir, 0755, true);
        }

        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);

        $novoNome = strtolower(trim(preg_replace('/[^a-zA-Z0-9]/', '-', $nome)));
        $nome_foto = uniqid() . '-' . $novoNome . '.' . $ext;

        if (move_uploaded_file($file['tmp_name'], $dir . $nome_foto)) {
            return 'clientes/' . $nome_foto;
        }

        return null;
    }
}
