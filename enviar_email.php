<?php
// Carregar o autoload do Composer (se estiver usando o Composer)
require 'vendor/autoload.php';

// Importar a classe PHPMailer no escopo global
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$response = []; // Array para armazenar as respostas

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber os dados do formulário
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Instanciar o PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configurações do servidor
        $mail->isSMTP();                                          // Definir o uso do SMTP
        $mail->Host       = 'smtp.hostinger.com';                     // Defina o servidor SMTP que você vai usar (aqui usando o Gmail)
        $mail->SMTPAuth   = true;                                 // Habilitar autenticação SMTP
        $mail->Username   = 'cafedivino@smpsistema.com.br';                 // Seu endereço de e-mail (SMTP)
        $mail->Password   = 'CafeDivino@01';                          // Sua senha de e-mail (ou app password no caso do Gmail)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;   // SSL 
        $mail->Port       = 465;                                  // Porta SMTP segura para SSL

        // Remetente
        $mail->setFrom('cafedivino@smpsistema.com.br', 'Nome do Remetente'); // Definir quem está enviando o e-mail

        // Destinatário
        $mail->addAddress('biel_nando2012@hotmail.com', 'Nome do Destinatário');  // Definir o destinatário do e-mail

        // Conteúdo do e-mail
        $mail->isHTML(true);                                      // Definir que o e-mail será enviado no formato HTML
        $mail->Subject = $subject;                                // Assunto do e-mail
        $mail->Body    = "<h1>Nova mensagem de contato</h1>
                          <p><strong>Nome:</strong> $name</p>
                          <p><strong>E-mail:</strong> $email</p>
                          <p><strong>Assunto:</strong> $subject</p>
                          <p><strong>Mensagem:</strong><br>$message</p>";
        $mail->AltBody = "Nome: $name\nE-mail: $email\nAssunto: $subject \nMensagem:\n$message";  // Texto alternativo, para leitores de e-mail que não suportam HTML

        // Enviar e-mail

        // Enviar e-mail
        if ($mail->send()) {
            $response = ['status' => 'success', 'message' => 'Mensagem enviada com sucesso!'];
        } else {
            $response = ['status' => 'error', 'message' => 'Erro ao enviar a mensagem.'];
        }
    } catch (Exception $e) {
        // Captura o erro e envia de volta como JSON
        $response = ['status' => 'error', 'message' => "Erro ao enviar a mensagem: {$mail->ErrorInfo}"];
    }
}

// Retorna a resposta como JSON
echo json_encode($response);
