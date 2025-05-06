<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



class ContatoController extends Controller
{

    private $contatoModel;
    private $funcionarioModel;
    private $produtoModel;
    private $depoimentoModel;


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
        $dados['titulo'] = 'Café Divino | Contato';

        $this->carregarViews('contato', $dados);
    }

    //##############################################################
    // BACK-END DASHBOARD CONTATO
    //##############################################################



    public function listar()
    {
         // Verifica se está logado como funcionário
         if(!isset($_SESSION['usuario']) || $_SESSION['tipo'] !== 'funcionario') {
            header("Location:" . BASE_URL . "login");
            exit;
        }
        $dados = array();
        $dados['conteudo'] = 'admin/contato/listar';

        $dados['contatos'] = $this->contatoModel->getTodosContato();
        // var_dump($dados);

        // Passa os dados do usuário logado para a view
        $dados['usuario'] = $_SESSION['usuario'];


        $dados['totalProdutos'] = $this->produtoModel->getTotalProdutos();
        $dados['totalDepoimentos'] = $this->depoimentoModel->getTotalDepoimentos();
        $dados['totalFuncionarios'] = $this->funcionarioModel->getTotalFuncionarios();
        $dados['totalContatos'] = $this->contatoModel->getTotalContatos();

        $this->carregarViews('admin/index', $dados);
    }

    public function filtrarContatos()
    {
        $status = $_POST['status'] ?? 'AGUARDANDO';
        $pesquisa = $_POST['pesquisa'] ?? '';
        
        $contatos = $this->contatoModel->getContatosFiltrados($status, $pesquisa);
    
        echo json_encode($contatos);
    }

    public function enviar()
    {
        // Somente POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = htmlspecialchars(trim($_POST['name']), ENT_QUOTES, 'UTF-8');
            $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
            $subject = htmlspecialchars(trim($_POST['subject']), ENT_QUOTES, 'UTF-8');
            $message = htmlspecialchars(trim($_POST['message']), ENT_QUOTES, 'UTF-8');

            $dados = [
                'nome' => $name,
                'email' => $email,
                'assunto' => $subject,
                'mensagem' => $message
            ];

            // Salvar no banco
            if ($this->contatoModel->salvarContato($dados)) {
                if ($this->enviarEmail($dados)) {
                    $this->enviarResposta($dados);

                    echo json_encode(['status' => 'success', 'message' => 'Mensagem salva e enviada com sucesso!']);
                    exit;
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Mensagem salva, mas erro ao enviar e-mails.']);
                    exit;
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Erro ao salvar a mensagem no banco de dados.']);
                exit;
            }
        }
    }

    // Função para enviar o e-mail principal
    private function enviarEmail($dados)
    {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.hostinger.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'cafedivino@smpsistema.com.br';
            $mail->Password = 'CafeDivino@01';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;
            $mail->CharSet = 'UTF-8';

            $mail->setFrom('cafedivino@smpsistema.com.br', 'Café Divino - Contato Via Site');
            $mail->addAddress('cafedivino@smpsistema.com.br', 'Café Divino - Recepção');

            $mail->isHTML(true);
            $mail->Subject = $dados['assunto'];
            $mail->Body = "
                <h1>Nova Mensagem Recebida - Café Divino</h1>
                <p><strong>Nome:</strong> {$dados['nome']}</p>
                <p><strong>E-mail:</strong> {$dados['email']}</p>
                <p><strong>Assunto:</strong> {$dados['assunto']}</p>
                <p><strong>Mensagem:</strong></p>
                <p>{$dados['mensagem']}</p>
            ";
            $mail->AltBody = "Nome: {$dados['nome']}\nE-mail: {$dados['email']}\nAssunto: {$dados['assunto']}\nMensagem:\n{$dados['mensagem']}";

            $mail->send();
            return true;
        } catch (Exception $e) {
            error_log("Erro ao enviar o e-mail: {$mail->ErrorInfo}");
            return false;
        }
    }

    // Função para enviar a resposta automática
    private function enviarResposta($dados)
    {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.hostinger.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'cafedivino@smpsistema.com.br';
            $mail->Password = 'CafeDivino@01';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;
            $mail->CharSet = 'UTF-8';

            $mail->setFrom('cafedivino@smpsistema.com.br', 'Café Divino');
            $mail->addAddress($dados['email'], $dados['nome']);

            $mail->isHTML(true);
            $mail->Subject = "Obrigado por entrar em contato com o Café Divino!";
            $mail->Body = "
                <h1>Obrigado pela sua mensagem!</h1>
                <p>Olá, {$dados['nome']}!</p>
                <p>Agradecemos por entrar em contato com o Café Divino. Em breve retornaremos o seu contato.</p>
                <p>Atenciosamente,<br>Equipe Café Divino</p>
            ";
            $mail->AltBody = "Obrigado pela sua mensagem, {$dados['nome']}! Em breve retornaremos o contato.";

            $mail->send();
            return true;
        } catch (Exception $e) {
            error_log("Erro ao enviar o e-mail de resposta: {$mail->ErrorInfo}");
            return false;
        }
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

        $dadosContato = $this->contatoModel->getDadosContato($id);

        if (!$dadosContato) {
            // Se o contato não existir, redireciona para a lista de contatos
            header('Location: ' . BASE_URL . 'contato/listar');
            exit;
        }

        // Verifica se foi enviada uma resposta (POST)
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $resposta = htmlspecialchars(trim($_POST['resposta']), ENT_QUOTES, 'UTF-8');

            // Verifica se a resposta não está vazia
            if (!empty($resposta)) {
                $emailDestinatario = $dadosContato['email_contato'];
                $nomeDestinatario = $dadosContato['nome_contato'];
                $assuntoResposta = "Resposta ao seu contato - Café Divino";

                // Cria um novo objeto PHPMailer para enviar a resposta
                $mail = new PHPMailer(true);

                try {
                    $mail->isSMTP();
                    $mail->Host = 'smtp.hostinger.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'cafedivino@smpsistema.com.br';
                    $mail->Password = 'CafeDivino@01';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                    $mail->Port = 465;
                    $mail->CharSet = 'UTF-8';

                    $mail->setFrom('cafedivino@smpsistema.com.br', 'Café Divino');
                    $mail->addAddress($emailDestinatario, $nomeDestinatario);

                    $mail->isHTML(true);
                    $mail->Subject = $assuntoResposta;
                    $mail->Body = nl2br($resposta);
                    $mail->AltBody = strip_tags($resposta);

                    // Envia o e-mail
                    $mail->send();

                    // Se o e-mail foi enviado com sucesso, atualiza o status do contato no banco de dados
                    $this->contatoModel->atualizarStatusRespondido($id);

                    // Armazena uma mensagem de sucesso na sessão e redireciona
                    $_SESSION['mensagem'] = 'Resposta enviada com sucesso!';
                    $_SESSION['tipo-msg'] = 'sucesso';
                    header('Location: ' . BASE_URL . 'contato/listar');
                    exit;
                } catch (Exception $e) {
                    // Se ocorrer um erro ao enviar o e-mail, armazena a mensagem de erro na sessão
                    $_SESSION['mensagem'] = 'Erro ao enviar resposta: ' . $mail->ErrorInfo;
                    $_SESSION['tipo-msg'] = 'erro';

                    // Redireciona para a página de edição com a mensagem de erro
                    header('Location: ' . BASE_URL . 'contato/editar/' . $id);
                    exit;
                }
            } else {
                // Caso a resposta esteja vazia, define uma mensagem de erro
                $_SESSION['mensagem'] = 'Preencha a resposta antes de enviar.';
                $_SESSION['tipo-msg'] = 'erro';
                header('Location: ' . BASE_URL . 'contato/editar/' . $id);
                exit;
            }
        }

        // Se não for um POST, carrega os dados do contato para exibição no formulário
        $dados['dadosContato'] = $dadosContato;
        $dados['conteudo'] = 'admin/contato/editar';

        // Carrega a view com os dados
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

        $desativar = $this->contatoModel->desativarContato($id);

        if ($desativar) {
            $_SESSION['mensagem'] = 'Contato desativado com sucesso';
            $_SESSION['tipo-msg'] = 'sucesso';

            echo json_encode(['sucesso' => true]);
        } else {
            echo json_encode(['sucesso' => false, 'mensagem' => 'Falha ao desativar o Contato']);
        }
    }
}
