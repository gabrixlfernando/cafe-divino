        <?php require_once('template/topo.php');?>


    <body>
        <!-- Header -->
        <?php require_once('template/menu.php');?>
        <?php require_once('template/banner-contato.php');?>

                
        <main>
        <!-- formulario -->
        <?php require_once('template/formContato.php'); ?>

        <!-- mapa -->
        <?php require_once('template/mapa.php'); ?>

        </main>

        <!-- Rodapé -->
        <?php require_once('template/rodape.php');?>

        <script>
            $(document).ready(function() {
                $('#contactForm').on('submit', function(e) {
                    e.preventDefault(); // Impedir o envio padrão do formulário
            
                    $.ajax({
                        url: '<?php echo BASE_URL?>contato/enviar', // Arquivo PHP para processar o envio do e-mail
                        type: 'POST',
                        data: $(this).serialize(), // Serializar os dados do formulário
                        dataType: 'json', // Especifica que estamos esperando um JSON
                        success: function(response) {
                            if (response.status === 'success') {
                                // Exibir mensagem de sucesso
                                $('#responseMessage').html('<p style="color: green;">' + response.message + '</p>');
                                $('#contactForm')[0].reset(); // Limpar o formulário após o envio
                            } else {
                                // Exibir mensagem de erro
                                $('#responseMessage').html('<p style="color: red;">' + response.message + '</p>');
                            }
                            $('#responseMessage').show(); // Exibir a div da mensagem
                        },
                        error: function() {
                            // Mensagem de erro genérica em caso de falha
                            $('#responseMessage').html('<p style="color: red;">Erro ao enviar a mensagem. Tente novamente.</p>');
                            $('#responseMessage').show();
                        }
                    });
                });
            });


        </script>



    </body>
</html>
