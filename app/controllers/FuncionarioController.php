<?php

class FuncionarioController extends Controller
{
    private $funcionarioModel;
    private $produtoModel;
    private $depoimentoModel;
    private $contatoModel;

    public function __construct()
    {
        $this->funcionarioModel = new Funcionario();
        $this->produtoModel = new produto();
        $this->depoimentoModel = new Depoimento();
        $this->contatoModel = new Contato();
    }


    public function listar()
    {
        // Verifica se está logado como funcionário
        if(!isset($_SESSION['usuario']) || $_SESSION['tipo'] !== 'funcionario') {
            header("Location:" . BASE_URL . "login");
            exit;
        }
       
        $dados = array();

        $dados['conteudo'] = 'admin/funcionario/listar';

        $dados['funcionarios'] = $this->funcionarioModel->getTodosFuncionario();


        $dados['totalProdutos'] = $this->produtoModel->getTotalProdutos();
        $dados['totalDepoimentos'] = $this->depoimentoModel->getTotalDepoimentos();
        $dados['totalFuncionarios'] = $this->funcionarioModel->getTotalFuncionarios();
        $dados['totalContatos'] = $this->contatoModel->getTotalContatos();

        // Passa os dados do usuário logado para a view
        $dados['usuario'] = $_SESSION['usuario'];

        $this->carregarViews('admin/index', $dados);
    }

    public function adicionar()
    {
         // Verifica se está logado como funcionário
         if(!isset($_SESSION['usuario']) || $_SESSION['tipo'] !== 'funcionario') {
            header("Location:" . BASE_URL . "login");
            exit;
        }
        
        $dados = array();

        $dados['totalProdutos'] = $this->produtoModel->getTotalProdutos();
        $dados['totalDepoimentos'] = $this->depoimentoModel->getTotalDepoimentos();
        $dados['totalFuncionarios'] = $this->funcionarioModel->getTotalFuncionarios();
        $dados['totalContatos'] = $this->contatoModel->getTotalContatos();

        // Passa os dados do usuário logado para a view
        $dados['usuario'] = $_SESSION['usuario'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Sanitização dos dados recebidos via POST
            $nome_funcionario      = filter_input(INPUT_POST, 'nome_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
            $cpf_funcionario       = filter_input(INPUT_POST, 'cpf_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
            $endereco_funcionario  = filter_input(INPUT_POST, 'endereco_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
            $bairro_funcionario    = filter_input(INPUT_POST, 'bairro_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
            $cidade_funcionario    = filter_input(INPUT_POST, 'cidade_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
            $estado_funcionario    = filter_input(INPUT_POST, 'estado_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
            $telefone_funcionario  = filter_input(INPUT_POST, 'telefone_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
            $email_funcionario     = filter_input(INPUT_POST, 'email_funcionario', FILTER_SANITIZE_EMAIL);
            $senha_funcionario     = filter_input(INPUT_POST, 'senha_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
            $status_funcionario    = filter_input(INPUT_POST, 'status_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);

            // Verifica se os campos obrigatórios foram preenchidos
            if (
                $nome_funcionario && $cpf_funcionario && $email_funcionario &&
                $senha_funcionario && $status_funcionario
            ) {
                $data_cad_funcionario = date('Y-m-d H:i:s');


                $dadosFuncionario = array(
                    'nome_funcionario'      => $nome_funcionario,
                    'cpf_funcionario'       => $cpf_funcionario,
                    'endereco_funcionario'  => $endereco_funcionario,
                    'bairro_funcionario'    => $bairro_funcionario,
                    'cidade_funcionario'    => $cidade_funcionario,
                    'estado_funcionario'    => $estado_funcionario,
                    'telefone_funcionario'  => $telefone_funcionario,
                    'email_funcionario'     => $email_funcionario,
                    'senha_funcionario'     => $senha_funcionario,
                    'data_cad_funcionario'  => $data_cad_funcionario,
                    'status_funcionario'    => $status_funcionario
                );

                // Inserir no banco de dados
                $idFuncionario = $this->funcionarioModel->addFuncionario($dadosFuncionario);

                if ($idFuncionario) {
                    $_SESSION['mensagem'] = 'Funcionário cadastrado com sucesso!';
                    $_SESSION['tipo-msg'] = 'sucesso';
                    header('Location: ' . BASE_URL . 'funcionario/listar');
                    exit;
                } else {
                    $dados['mensagem'] = 'Erro ao cadastrar o funcionário.';
                    $dados['tipo-msg'] = 'erro';
                }
            } else {
                $dados['mensagem'] = 'Por favor, preencha todos os campos obrigatórios.';
                $dados['tipo-msg'] = 'erro';
            }
        }

        $dados['conteudo'] = 'admin/funcionario/adicionar';
        $this->carregarViews('admin/index', $dados);
    }

    public function editar($id = null)
    {
        $dados = array();

        $dados['totalProdutos'] = $this->produtoModel->getTotalProdutos();
        $dados['totalDepoimentos'] = $this->depoimentoModel->getTotalDepoimentos();
        $dados['totalFuncionarios'] = $this->funcionarioModel->getTotalFuncionarios();
        $dados['totalContatos'] = $this->contatoModel->getTotalContatos();

        // Passa os dados do usuário logado para a view
        $dados['usuario'] = $_SESSION['usuario'];

        $dadosFuncionario = $this->funcionarioModel->getDadosFuncionario($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome_funcionario     = filter_input(INPUT_POST, 'nome_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
            $cpf_funcionario      = filter_input(INPUT_POST, 'cpf_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
            $endereco_funcionario = filter_input(INPUT_POST, 'endereco_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
            $bairro_funcionario   = filter_input(INPUT_POST, 'bairro_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
            $cidade_funcionario   = filter_input(INPUT_POST, 'cidade_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
            $estado_funcionario   = filter_input(INPUT_POST, 'estado_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
            $telefone_funcionario = filter_input(INPUT_POST, 'telefone_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
            $email_funcionario    = filter_input(INPUT_POST, 'email_funcionario', FILTER_SANITIZE_EMAIL);
            $senha_funcionario    = filter_input(INPUT_POST, 'senha_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
            $status_funcionario   = filter_input(INPUT_POST, 'status_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);

            if ($nome_funcionario && $cpf_funcionario && $email_funcionario) {
                $dadosFuncionario = array(
                    'id_funcionario'      => $id,
                    'nome_funcionario'    => $nome_funcionario,
                    'cpf_funcionario'     => $cpf_funcionario,
                    'endereco_funcionario' => $endereco_funcionario,
                    'bairro_funcionario'  => $bairro_funcionario,
                    'cidade_funcionario'  => $cidade_funcionario,
                    'estado_funcionario'  => $estado_funcionario,
                    'telefone_funcionario' => $telefone_funcionario,
                    'email_funcionario'   => $email_funcionario,
                    'senha_funcionario'   => $senha_funcionario,
                    'status_funcionario'  => $status_funcionario
                );

                $sucesso = $this->funcionarioModel->editarFuncionario($dadosFuncionario);

                if ($sucesso) {
                    $_SESSION['mensagem'] = 'Funcionário alterado com sucesso!';
                    $_SESSION['tipo-msg'] = 'sucesso';
                    header('Location: ' . BASE_URL . 'funcionario/listar');
                    exit;
                } else {
                    $dados['mensagem'] = 'Erro ao alterar o funcionário.';
                    $dados['tipo-msg'] = 'erro';
                }
            } else {
                $dados['mensagem'] = 'Erro - preencha todos os campos obrigatórios.';
                $dados['tipo-msg'] = 'erro';
            }
        }

        if (!$dadosFuncionario) {
            header('Location: ' . BASE_URL . 'funcionario/listar');
            exit;
        }

        $dados['dadosFuncionario'] = $dadosFuncionario;
        $dados['conteudo'] = 'admin/funcionario/editar';

        $this->carregarViews('admin/index', $dados);
    }


    public function desativar($id = null)
    {
        header('Content-Type: application/json');

        if ($id === null) {
            http_response_code(400);
            echo json_encode(['sucesso' => false, 'mensagem' => 'ID inválido']);
            exit;
        }

        $desativar = $this->funcionarioModel->desativarFuncionario($id);

        if ($desativar) {
            $_SESSION['mensagem'] = 'Funcionário desativado com sucesso';
            $_SESSION['tipo-msg'] = 'sucesso';

            echo json_encode(['sucesso' => true]);
        } else {
            echo json_encode(['sucesso' => false, 'mensagem' => 'Falha ao desativar o Funcionário']);
        }
    }

    public function filtrarFuncionarios()
    {
        $status = $_POST['status'] ?? 'ATIVO';
        $pesquisa = $_POST['pesquisa'] ?? '';
        
        $funcionarios = $this->funcionarioModel->getFuncionariosFiltrados($status, $pesquisa);
    
        echo json_encode($funcionarios);
    }

    public function ativar()
    {
        header('Content-Type: application/json');

        $id = $_POST['id_funcionario'] ?? null;

        if ($id === null) {
            http_response_code(400);
            echo json_encode(['sucesso' => false, 'mensagem' => 'ID inválido']);
            exit;
        }

        $ativar = $this->funcionarioModel->ativarFuncionario($id);

        if ($ativar) {
            $_SESSION['mensagem'] = 'Funcionário ativado com sucesso';
            $_SESSION['tipo-msg'] = 'sucesso';

            echo json_encode(['sucesso' => true]);
        } else {
            echo json_encode(['sucesso' => false, 'mensagem' => 'Falha ao ativar o funcionário']);
        }
    }
}
