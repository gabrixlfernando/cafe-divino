<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['mensagem']) && isset($_SESSION['tipo-msg'])) {
    // Exibir a mensagem
    $mens = $_SESSION['mensagem'];
    $tipo = $_SESSION['tipo-msg'];

    if ($tipo == 'sucesso') {
        echo '<div class="alert alert-success" role="alert">' . $mens . '</div>';
    } else if ($tipo == 'erro') {
        echo '<div class="alert alert-danger" role="alert">' . $mens . '</div>';
    }

    unset($_SESSION['mensagem']);
    unset($_SESSION['tipo-msg']);
}
?>



<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th scope="col">Foto</th>
            <th scope="col">Nome</th>
            <th scope="col">Mensagem</th>
            <th scope="col">Profissão</th>
            <th scope="col">Status</th>
            <th scope="col">Editar</th>
            <th scope="col">Desativar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($depoimentos as $linha): ?>
            <tr>
                <td scope="col">

                    <img src="<?php echo BASE_URL ?><?php

                                                    $caminhoImg = $_SERVER['DOCUMENT_ROOT'] . '/cafe-divino/public/uploads/' . $linha['foto_depoimento'];

                                                    if ($linha['foto_depoimento'] != "") {
                                                        if (file_exists($caminhoImg)) {
                                                            echo "uploads/" . $linha['foto_depoimento'];
                                                        } else {
                                                            echo 'uploads/semfoto.png';
                                                        }
                                                    } else {
                                                        echo 'uploads/semfoto.png';
                                                    }

                                                    ?>" class="img-thumbnail img-tabela"
                        alt="<?php echo htmlspecialchars($linha['alt_depoimento'], ENT_QUOTES, 'UTF-8'); ?>" />
                </td>
                <td scope="col"><?php echo htmlspecialchars($linha['nome_depoimento'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td scope="col"><?php echo htmlspecialchars($linha['mens_depoimento'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td scope="col"><?php echo htmlspecialchars($linha['profissao_depoimento'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td scope="col"><?php echo htmlspecialchars($linha['status_depoimento'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td>
                    <a href="<?php echo BASE_URL ?>depoimento/editar/<?php echo $linha['id_depoimento']; ?>"
                        type="button" class="btn btn-primary"><i class="bi bi-pencil-fill"></i></a>
                </td>
                <td>
                    <a href="#"
                        type="button" class="btn btn-danger" title="Desativar"
                        onclick="abrirModal(<?php echo $linha['id_depoimento']; ?>); return false;">
                        <i class="bi bi-trash-fill"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="modal fade" id="desativarModal" tabindex="-1" aria-labelledby="desativarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="desativarModalLabel">Desativar Depoimento</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h2>Deseja realmente desativar o Depoimento?</h2>
                <input type="hidden" id="idParaDesativar" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btnDesativar">Desativar</button>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        function abrirModal(id_depoimento) {

            if ($('#desativarModal').hasClass('show')) {
                return
            }
            document.getElementById('idParaDesativar').value = id_depoimento;
            $('#desativarModal').modal('show');
        }

        document.getElementById('btnDesativar').addEventListener('click', function() {
            const idDepoimento = document.getElementById('idParaDesativar').value;
            if (idDepoimento) {
                // console.log("id recuperado: " + idDepoimento);
                desativarDepoimento(idDepoimento);
            }
        })

        function desativarDepoimento(idDepoimento) {
            fetch(`<?php echo BASE_URL ?>depoimento/desativar/${idDepoimento}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`Erro HTTP: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    $('#desativarModal').modal('hide');
                    location.reload();
                })

                .catch(error => {
                    alert("Erro na requisição. Verifique a conexão com o servidor.");
                })
        }


        window.abrirModal = abrirModal;
    })
</script>