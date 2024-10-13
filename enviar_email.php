<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Definir variáveis com os dados do formulário
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Definir o e-mail para o qual a mensagem será enviada
    $to = "biel_nando2012@hotmail.com";  // Insira seu e-mail aqui
    $email_subject = "Nova mensagem de contato: $subject";
    $email_body = "Você recebeu uma nova mensagem de $name ($email).\n\n".
                  "Assunto: $subject\n\n".
                  "Mensagem:\n$message";

    // Cabeçalhos de e-mail
    $headers = "From: $email\n";
    $headers .= "Reply-To: $email";

    // Enviar o e-mail
    if (mail($to, $email_subject, $email_body, $headers)) {
        // Redirecionar ou mostrar uma mensagem de sucesso
        echo "Mensagem enviada com sucesso!";
    } else {
        // Mostrar uma mensagem de erro
        echo "Erro ao enviar a mensagem. Tente novamente.";
    }
}
?>
