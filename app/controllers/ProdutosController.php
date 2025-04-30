<?php

class ProdutosController extends Controller
{
    private $produtoModel;
    private $funcionarioModel;
    private $depoimentoModel;
    private $contatoModel;

    public function __construct()
    {
        $this->funcionarioModel = new Funcionario();
        $this->produtoModel = new produto();
        $this->depoimentoModel = new Depoimento();
        $this->contatoModel = new Contato();
    }

    //##############################################################
    // BACK-END DASHBOARD produto
    //##############################################################

    // 1- Método listar todos os produtos ativos

    public function listar()
    {
        $dados = array();
        $dados['conteudo'] = 'admin/produto/listar';

        $dados['produtos'] = $this->produtoModel->getAllProdutos();

        $dados['totalProdutos'] = $this->produtoModel->getTotalProdutos();
        $dados['totalDepoimentos'] = $this->depoimentoModel->getTotalDepoimentos();
        $dados['totalFuncionarios'] = $this->funcionarioModel->getTotalFuncionarios();
        $dados['totalContatos'] = $this->contatoModel->getTotalContatos();
        // var_dump($dados);
        $this->carregarViews('admin/index', $dados);
    }

    public function filtrarProdutos()
{
    $status = $_POST['status'] ?? 'ATIVO';
    $produtos = $this->produtoModel->getProdutosPorStatus($status);

    echo json_encode($produtos);
}

    public function adicionar()
    {
        $dados = array();

        $dados['totalProdutos'] = $this->produtoModel->getTotalProdutos();
        $dados['totalDepoimentos'] = $this->depoimentoModel->getTotalDepoimentos();
        $dados['totalFuncionarios'] = $this->funcionarioModel->getTotalFuncionarios();
        $dados['totalContatos'] = $this->contatoModel->getTotalContatos();

        //Se o carregamento da pagina esta vindo do form 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //DADOS DOS CAMPOS DE INPUT -> NAME
            $nome_produto = filter_input(INPUT_POST, 'nome_produto', FILTER_SANITIZE_SPECIAL_CHARS);
            $descricao_produto = filter_input(INPUT_POST, 'descricao_produto', FILTER_SANITIZE_SPECIAL_CHARS);
            $alt_produto = $nome_produto;
            $categoria_produto = filter_input(INPUT_POST, 'descricao_produto', FILTER_SANITIZE_SPECIAL_CHARS);
            $ml_produto = filter_input(INPUT_POST, 'descricao_produto', FILTER_SANITIZE_SPECIAL_CHARS);
            $valor_produto = filter_input(INPUT_POST, 'valor_produto', FILTER_SANITIZE_NUMBER_FLOAT);
            $status_produto = filter_input(INPUT_POST, 'status_produto', FILTER_SANITIZE_SPECIAL_CHARS);

            if ($nome_produto && $descricao_produto) {

                if (isset($_FILES['foto_produto']) && $_FILES['foto_produto']['error'] == 0) {
                    // realizar o upload da imagem
                    $arquivo = $this->uploadFoto($_FILES['foto_produto'], $nome_produto);
                }
                $dadosProduto = array(
                    'nome_produto'          => $nome_produto,
                    'descricao_produto'     => $descricao_produto,
                    'alt_produto'           => $alt_produto,
                    'categoria_produto'     => $categoria_produto,
                    'ml_produto'     => $ml_produto,
                    'valor_produto'     => $valor_produto,
                    'status_produto'        => $status_produto,
                    'foto_produto'          => $arquivo

                );


                // Inserir na base de dados
                $idProduto = $this->produtoModel->addProduto($dadosProduto);

                if ($idProduto) {
                    $_SESSION['mensagem'] = 'Produto adicionado com sucesso!';
                    $_SESSION['tipo-msg'] = 'sucesso';
                    header('Location: ' . BASE_URL . 'produtos/listar');
                    exit;
                } else {
                    $dados['mensagem'] = 'Erro ao adicionar o produto.';
                    $dados['tipo-msg'] = 'erro';
                }
            } else {
                $dados['mensagem'] = 'Erro ao adicionar o produto - Informe todos os dados.';
                $dados['tipo-msg'] = 'erro';
            }

            // $foto_produto
        }


        $dados['conteudo'] = 'admin/produto/adicionar';

        // $dados['produtos'] = $this->produtoModel->getAllProdutos();
        // var_dump($dados);
        $this->carregarViews('admin/index', $dados);
    }
    public function editar($id = null){
        $dados = array();

        $dados['totalProdutos'] = $this->produtoModel->getTotalProdutos();
        $dados['totalDepoimentos'] = $this->depoimentoModel->getTotalDepoimentos();
        $dados['totalFuncionarios'] = $this->funcionarioModel->getTotalFuncionarios();
        $dados['totalContatos'] = $this->contatoModel->getTotalContatos();
    
        $dadosProduto = $this->produtoModel->getDadosProduto($id);
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome_produto = filter_input(INPUT_POST, 'nome_produto', FILTER_SANITIZE_SPECIAL_CHARS);
            $descricao_produto = filter_input(INPUT_POST, 'descricao_produto', FILTER_SANITIZE_SPECIAL_CHARS);
            $alt_produto = $nome_produto;
            $categoria_produto = filter_input(INPUT_POST, 'categoria_produto', FILTER_SANITIZE_SPECIAL_CHARS);
            $ml_produto = filter_input(INPUT_POST, 'ml_produto', FILTER_SANITIZE_NUMBER_INT);
            $valor_produto = filter_input(INPUT_POST, 'valor_produto', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $status_produto = filter_input(INPUT_POST, 'status_produto', FILTER_SANITIZE_SPECIAL_CHARS);
    
            if ($nome_produto && $descricao_produto) {
    
                $arquivo = $dadosProduto['foto_produto']; // valor padrão
    
                if (isset($_FILES['foto_produto']) && $_FILES['foto_produto']['error'] == 0) {
                    $arquivo = $this->uploadFoto($_FILES['foto_produto'], $nome_produto);
                }
    
                $dadosProduto = array(
                    'id_produto'        => $id,
                    'nome_produto'      => $nome_produto,
                    'descricao_produto' => $descricao_produto,
                    'alt_produto'       => $alt_produto,
                    'categoria_produto' => $categoria_produto,
                    'ml_produto'        => $ml_produto,
                    'valor_produto'     => $valor_produto,
                    'status_produto'    => $status_produto,
                    'foto_produto'      => $arquivo
                );
    
                $idProduto = $this->produtoModel->editarProduto($dadosProduto);
    
                if ($idProduto) {
                    $_SESSION['mensagem'] = 'Produto alterado com sucesso!';
                    $_SESSION['tipo-msg'] = 'sucesso';
                    header('Location: ' . BASE_URL . 'produtos/listar');
                    exit;
                } else {
                    $dados['mensagem'] = 'Erro ao alterar o produto.';
                    $dados['tipo-msg'] = 'erro';
                }
            } else {
                $dados['mensagem'] = 'Erro ao alterar o produto - Informe todos os dados.';
                $dados['tipo-msg'] = 'erro';
            }
        }
    
        if (!$dadosProduto) {
            header('Location: ' . BASE_URL . 'produtos/listar');
            exit;
        }
    
        $dados['dadosProduto'] = $dadosProduto;
        $dados['conteudo'] = 'admin/produto/editar';
    
        $this->carregarViews('admin/index', $dados);
    }

    public function ativar() {
        header('Content-Type: application/json');
    
        $id = $_POST['id_produto'] ?? null;
    
        if ($id === null) {
            http_response_code(400);
            echo json_encode(['sucesso' => false, 'mensagem' => 'ID inválido']);
            exit;
        }
    
        $ativar = $this->produtoModel->ativarProduto($id);
    
        if ($ativar) {
            $_SESSION['mensagem'] = 'Produto ativado com sucesso';
            $_SESSION['tipo-msg'] = 'sucesso';
    
            echo json_encode(['sucesso' => true]);
        } else {
            echo json_encode(['sucesso' => false, 'mensagem' => 'Falha ao ativar o produto']);
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

        $desativar = $this->produtoModel->desativarProduto($id);

        if ($desativar) {
            $_SESSION['mensagem'] = 'Produto desativado com sucesso';
            $_SESSION['tipo-msg'] = 'sucesso';

            echo json_encode(['sucesso' => true]);
        } else {
            echo json_encode(['sucesso' => false, 'mensagem' => 'Falha ao desativar o produto']);
        }
    }

    public function uploadFoto($file, $nome)
    {
        $dir = '../public/uploads/produtos/';

        if (!file_exists($dir)) {
            mkdir($dir, 0755, true);
        }

        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);

        $novoNome = strtolower(trim(preg_replace('/[^a-zA-z0-9]/', '-', $nome)));
        $nome_foto = uniqid() . $novoNome . '.' . $ext;

        if (move_uploaded_file($file['tmp_name'], $dir . $nome_foto)) {
            return 'produtos/' . $nome_foto;
        }

        return false;
    }
}
