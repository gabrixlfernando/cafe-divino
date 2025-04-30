<?php require_once('template/topo.php'); ?>



<!-- Header -->
<?php require_once('template/menu.php'); ?>
<?php require_once('template/banner-depoimento.php'); ?>


<main>
    <!-- formulario -->


    <section class="contact-info">


        <h2>Depoimento</h2>
        <h3>Queremos ouvir você! Deixe seu depoimento.</h3>
        <div data-aos="fade-up" class="contact-icons">
            <div class="contact-item">
                <i class="fas fa-map-marker-alt"></i>
                <h4>Endereço</h4>
                <p>Avenida Marechal Tito, 1500</p>
            </div>
            <div class="contact-item">
                <i class="fas fa-phone-alt"></i>
                <h4>Telefone</h4>
                <p>(11) 5456-789</p>
            </div>
            <div class="contact-item">
                <i class="fas fa-envelope"></i>
                <h4>Email</h4>
                <p>cafedivino@smpsistema.com</p>
            </div>
        </div>

    </section>

    <section class="contact-form container-fluid">
        <div class="containeer">
            <form id="depoimentoForm" action="<?php echo BASE_URL ?>depoimento/salvar" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <!-- Coluna da imagem (3 colunas) -->
                    <div class="col-md-3 d-flex flex-column align-items-center">
                        <label for="foto_depoimento" class="form-label">Foto</label>
                        <img id="imagePreview" src="<?php echo BASE_URL ?>uploads/semfoto.png"
                            class="img-preview mb-3" alt="Pré-visualização">
                        <input type="file" name="foto_depoimento" id="foto_depoimento"
                            accept="image/*" style="display: none;" required>
                    </div>

                    <!-- Coluna do formulário (9 colunas) -->
                    <div class="col-md-9">
                        <div class="form-group mb-3">
                            <input type="text" name="nome_depoimento" id="nome_depoimento" required placeholder="Seu Nome">
                            <input type="text" name="profissao_depoimento" id="profissao_depoimento" required placeholder="Profissão">
                        </div>

                        <div class="form-group mb-3">
                            <textarea name="mens_depoimento" id="mens_depoimento" rows="5" required placeholder="Mensagem"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Enviar Depoimento</button>

                        <div id="depoimentoResponse" class="mt-3"></div>
                    </div>
                </div>
            </form>

        </div>

    </section>

    <!-- mapa -->
    <?php require_once('template/mapa.php'); ?>

</main>

<!-- Rodapé -->
<?php require_once('template/rodape.php'); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const preview = document.getElementById('imagePreview');
        const input = document.getElementById('foto_depoimento');

        // Clicar na imagem abre o input de arquivo
        preview.addEventListener('click', function() {
            input.click();
        });

        // Atualiza o preview da imagem ao selecionar uma nova
        input.addEventListener('change', function() {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        });
    });

    $(document).ready(function() {
        $('#depoimentoForm').on('submit', function(e) {
            e.preventDefault();

            var formData = new FormData(this); // Para suportar arquivos (foto)

            $.ajax({
                url: '<?php echo BASE_URL ?>depoimento/salvar',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    let msg = '<p style="color: ' + (response.status === 'success' ? 'green' : 'red') + ';">' + response.message + '</p>';
                    $('#depoimentoResponse').html(msg).show();

                    if (response.status === 'success') {
                        $('#depoimentoForm')[0].reset();

                        // Restaura imagem para a padrão "semfoto.png"
                        $('#imagePreview').attr('src', '<?php echo BASE_URL ?>uploads/semfoto.png');

                        // Remove mensagem após 5 segundos
                        setTimeout(function() {
                            $('#depoimentoResponse').fadeOut('slow', function() {
                                $(this).html('').show();
                            });
                        }, 5000);
                    }
                },
                error: function() {
                    $('#depoimentoResponse').html('<p style="color: red;">Erro inesperado. Tente novamente.</p>').show();
                }
            });
        });
    });
</script>

</body>

</html>