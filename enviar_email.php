<?php
// Carregar o autoload do Composer (se estiver usando o Composer)
require 'vendor/autoload.php';

// Importar a classe PHPMailer no escopo global
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$response = []; // Array para armazenar as respostas

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber os dados do formulário
    $name = htmlspecialchars(trim($_POST['name']), ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars(trim($_POST['email']), ENT_QUOTES, 'UTF-8');
    $subject = htmlspecialchars(trim($_POST['subject']), ENT_QUOTES, 'UTF-8');
    $message = htmlspecialchars(trim($_POST['message']), ENT_QUOTES, 'UTF-8');

    // Instanciar o PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configurações do servidor para o e-mail de contato principal
        $mail->isSMTP();
        $mail->Host       = 'smtp.hostinger.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'cafedivino@smpsistema.com.br';
        $mail->Password   = 'CafeDivino@01';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        // Definir codificação como UTF-8
        $mail->CharSet = 'UTF-8';

        // Remetente (Café Divino)
        $mail->setFrom('cafedivino@smpsistema.com.br', 'Café Divino - Contato Via Site');

        // Destinatário (Café Divino)
        $mail->addAddress('cafedivino@smpsistema.com.br', 'Café Divino - Recepção');

        // Conteúdo do e-mail enviado para o Café Divino
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = "
            <h1>Nova Mensagem Recebida - Café Divino</h1>
            <p>Prezado(a) membro da equipe,</p>

            <p>Você recebeu uma nova mensagem de contato através do site do Café Divino. Abaixo estão os detalhes da mensagem:</p>

            <p><strong>Nome do Cliente:</strong> $name</p>
            <p><strong>E-mail do Cliente:</strong> $email</p>
            <p><strong>Assunto:</strong> $subject</p>
            <p><strong>Mensagem:</strong></p>
            <p>\"$message\"</p>

            <p>Por favor, entre em contato com o cliente o mais breve possível para fornecer as informações ou o suporte solicitado.</p>

            <p>Atenciosamente,</p>
            <p>Sistema de Contato - Café Divino</p>
            ";
        $mail->AltBody = "Nome: $name\nE-mail: $email\nAssunto: $subject \nMensagem:\n$message";

        // Enviar o e-mail principal (para o Café Divino)
        if ($mail->send()) {
            // Após o e-mail principal ser enviado, enviar e-mail de resposta automática ao cliente
            $mail->clearAddresses(); // Limpa os endereços anteriores
            $mail->addAddress($email, $name); // Enviar para o e-mail inserido no formulário pelo cliente

            // Conteúdo do e-mail de resposta automática para o cliente
            $mail->Subject = "Obrigado por entrar em contato com o Café Divino!";
            $mail->Body    = "<h1>Obrigado pela sua mensagem!</h1>
                              <p>Olá, $name!</p>
                              <p>Agradecemos por entrar em contato com o Café Divino. Recebemos sua mensagem com sucesso e em breve retornaremos o seu contato.</p>
                              <p>Atenciosamente,<br>Equipe Café Divino</p>";
            $mail->AltBody = "Olá, $name!\nAgradecemos por entrar em contato com o Café Divino. Recebemos sua mensagem com sucesso e em breve retornaremos o seu contato.\n\nAtenciosamente,\nEquipe Café Divino";

            // Tentar enviar o e-mail de resposta automática
            if ($mail->send()) {
                $response = ['status' => 'success', 'message' => 'Mensagem enviada com sucesso!'];
            } else {
                $response = ['status' => 'error', 'message' => 'Mensagem enviada, mas houve um erro ao enviar o e-mail de agradecimento ao cliente.'];
            }
        } else {
            $response = ['status' => 'error', 'message' => 'Erro ao enviar a mensagem para o Café Divino.'];
        }
    } catch (Exception $e) {
        // Captura o erro e envia de volta como JSON
        $response = ['status' => 'error', 'message' => "Erro ao enviar a mensagem: {$mail->ErrorInfo}"];
    }
}

// Retorna a resposta como JSON
echo json_encode($response);
