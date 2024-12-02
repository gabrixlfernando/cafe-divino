<?php
// Carregar o autoload do Composer
require 'vendor/autoload.php';

// Importar classes do PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$response = []; // Array para armazenar respostas

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber os dados do formulário
    $name = htmlspecialchars(trim($_POST['name']), ENT_QUOTES, 'UTF-8');
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars(trim($_POST['subject']), ENT_QUOTES, 'UTF-8');
    $message = htmlspecialchars(trim($_POST['message']), ENT_QUOTES, 'UTF-8');

    // Dados organizados
    $dados = [
        'nome' => $name,
        'email' => $email,
        'assunto' => $subject,
        'mensagem' => $message
    ];

    // Função para salvar no banco de dados
    function salvarContato($dados)
    {
        try {
            // Conexão com o banco de dados
            $pdo = new PDO('mysql:host=smpsistema.com.br;dbname=u283879542_cafedivino', 'u283879542_cafedivino', '@CafeTi26');
            // $pdo = new PDO("mysql:host=localhost;dbname=db_cafedivino", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Query de inserção
            $query = "
                INSERT INTO contato 
                (nome_contato, email_contato, assunto_contato, mens_contato, lido_contato, status_contato, datahora_contato) 
                VALUES (:nome, :email, :assunto, :mensagem, 0, 'Aguardando', NOW())
            ";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':nome', $dados['nome']);
            $stmt->bindParam(':email', $dados['email']);
            $stmt->bindParam(':assunto', $dados['assunto']);
            $stmt->bindParam(':mensagem', $dados['mensagem']);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            error_log("Erro ao salvar no banco de dados: " . $e->getMessage());
            return false;
        }
    }

    // Função para enviar e-mail
    function enviarEmail($dados)
    {
        $mail = new PHPMailer(true);
        try {
            // Configurações do servidor SMTP
            $mail->isSMTP();
            $mail->Host       = 'smtp.hostinger.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'cafedivino@smpsistema.com.br';
            $mail->Password   = 'CafeDivino@01';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;

            $mail->CharSet = 'UTF-8';

            // Remetente e destinatário
            $mail->setFrom('cafedivino@smpsistema.com.br', 'Café Divino - Contato Via Site');
            $mail->addAddress('cafedivino@smpsistema.com.br', 'Café Divino - Recepção');

            // Conteúdo do e-mail
            $mail->isHTML(true);
            $mail->Subject = $dados['assunto'];
            $mail->Body = "
                <h1>Nova Mensagem Recebida - Café Divino</h1>

                <p>Prezado(a) membro da equipe,</p>
 
                <p>Você recebeu uma nova mensagem de contato através do site do Café Divino. Abaixo estão os detalhes da mensagem:</p>
                <p><strong>Nome:</strong> {$dados['nome']}</p>
                <p><strong>E-mail:</strong> {$dados['email']}</p>
                <p><strong>Assunto:</strong> {$dados['assunto']}</p>
                <p><strong>Mensagem:</strong></p>
                <p>{$dados['mensagem']}</p>

                <p>Por favor, entre em contato com o cliente o mais breve possível para fornecer as informações ou o suporte solicitado.</p>
 
                <p>Atenciosamente,</p>
                <p>Sistema de Contato - Café Divino</p>
            ";
            $mail->AltBody = "Nome: {$dados['nome']}\nE-mail: {$dados['email']}\nAssunto: {$dados['assunto']}\nMensagem:\n{$dados['mensagem']}";

            $mail->send();
            return true;
        } catch (Exception $e) {
            error_log("Erro ao enviar o e-mail: {$mail->ErrorInfo}");
            return false;
        }
    }

    // Função para enviar resposta automática
    function enviarResposta($dados)
    {
        $mail = new PHPMailer(true);
        try {
            // Configurações do servidor SMTP
            $mail->isSMTP();
            $mail->Host       = 'smtp.hostinger.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'cafedivino@smpsistema.com.br';
            $mail->Password   = 'CafeDivino@01';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;

            $mail->CharSet = 'UTF-8';

            // Remetente e destinatário
            $mail->setFrom('cafedivino@smpsistema.com.br', 'Café Divino');
            $mail->addAddress($dados['email'], $dados['nome']);

            // Conteúdo do e-mail
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

    // Salvar no banco e enviar e-mails
    if (salvarContato($dados)) {
        if (enviarEmail($dados)) {
            enviarResposta($dados);
            $response = ['status' => 'success', 'message' => 'Mensagem salva e enviada com sucesso!'];
        } else {
            $response = ['status' => 'error', 'message' => 'Mensagem salva, mas erro ao enviar e-mails.'];
        }
    } else {
        $response = ['status' => 'error', 'message' => 'Erro ao salvar a mensagem no banco de dados.'];
    }
}

// Retornar resposta JSON
echo json_encode($response);
