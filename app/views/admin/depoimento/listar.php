<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['mensagem']) && isset($_SESSION['tipo-msg'])) {
    // Exibir a mensagem
    $mens = $_SESSION['mensagem'];
    $tipo = $_SESSION['tipo-msg'];

    // Definindo a classe da mensagem de acordo com o tipo
    if ($tipo == 'sucesso') {
        echo '<div class="alert alert-success" id="mensagem-alert" role="alert">' . $mens . '</div>';
    } else if ($tipo == 'erro') {
        echo '<div class="alert alert-danger" id="mensagem-alert" role="alert">' . $mens . '</div>';
    }

    // Limpando a sessão
    unset($_SESSION['mensagem']);
    unset($_SESSION['tipo-msg']);
}
?>


<?php if (isset($_SESSION['mensagem'])): ?>
    <div class="alert alert-<?php echo $_SESSION['tipo-msg']; ?>" id="mensagem-alert">
        <?php echo $_SESSION['mensagem']; ?>
    </div>
    <script>
        setTimeout(function() {
            var mensagemAlert = document.getElementById('mensagem-alert');
            if (mensagemAlert) {
                mensagemAlert.style.display = 'none';
            }
        }, 5000); // Tempo em milissegundos (5000ms = 5 segundos)
    </script>
    <?php unset($_SESSION['mensagem']); unset($_SESSION['tipo-msg']); ?>
<?php endif; ?>

<style>
    .tabela-personalizada {
    background-color: #2b1b1b;
    color: #ffffff;
    border-collapse: collapse;
}

.tabela-personalizada th,
.tabela-personalizada td {
    background-color: transparent;
    border-color: #444; /* pode ajustar para um tom mais próximo também se quiser */
    padding: 12px;
}

.tabela-personalizada thead {
    background-color: #241a1a; /* um cabeçalho um pouco mais escuro, combinando */
}

.tabela-personalizada tbody tr:nth-child(even) {
    background-color:rgb(37, 24, 24); /* levemente mais claro */
}

.tabela-personalizada tbody tr:nth-child(odd) {
    background-color: #2b1b1b; /* seu fundo principal */
}

.tabela-personalizada tbody tr:hover {
    background-color: #3a2e2e; /* destaque no hover, ainda dentro da paleta */
}

</style>



<table class="tabela-personalizada">
    <thead>
        <tr>
            <th scope="col">Foto</th>
            <th scope="col">Nome</th>
            <th scope="col">Mensagem</th>
            <th scope="col">Profissão</th>
            <th scope="col">Status</th>
            <th scope="col">Ativar</th>
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
                    <a href="#" title="Ativar"
                        type="button" class="btn btn-success" onclick="abrirModalAtivar(<?php echo $linha['id_depoimento']; ?>); return false;">
                        <i class="fa-solid fa-check"></i></a>
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

<div class="modal fade" id="ativarModal" tabindex="-1" aria-labelledby="ativarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h1 class="modal-title fs-5" id="ativarModalLabel">Ativar Depoimento</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h2>Deseja realmente ativar o Depoimento?</h2>
                <input type="hidden" id="idParaAtivar" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success" id="btnAtivar">Ativar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="desativarModal" tabindex="-1" aria-labelledby="desativarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h1 class="modal-title fs-5" id="desativarModalLabel">Desativar Depoimento</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h2>Deseja realmente desativar o Depoimento?</h2>
                <input type="hidden" id="idParaDesativar" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="btnDesativar">Desativar</button>
            </div>
        </div>
    </div>
</div>


<script>
    // Verifica se a mensagem existe na tela
    window.onload = function() {
        var mensagemAlert = document.getElementById('mensagem-alert');
        if (mensagemAlert) {
            // Timeout para esconder a mensagem após 5 segundos (5000ms)
            setTimeout(function() {
                mensagemAlert.style.display = 'none';
            }, 5000); // 5 segundos
        }
    }

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


    document.addEventListener('DOMContentLoaded', function() {
        function abrirModalAtivar(id_depoimento) {

            if ($('#ativarModal').hasClass('show')) {
                return
            }
            document.getElementById('idParaAtivar').value = id_depoimento;
            $('#ativarModal').modal('show');
        }

        document.getElementById('btnAtivar').addEventListener('click', function() {
            const idDepoimento = document.getElementById('idParaAtivar').value;
            if (idDepoimento) {
                // console.log("id recuperado: " + idDepoimento);
                ativarDepoimento(idDepoimento);
            }
        })

        function ativarDepoimento(idDepoimento) {
            fetch(`<?php echo BASE_URL ?>depoimento/ativar/${idDepoimento}`, {
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
                    $('#ativarModal').modal('hide');
                    location.reload();
                })

                .catch(error => {
                    alert("Erro na requisição. Verifique a conexão com o servidor.");
                })
        }


        window.abrirModalAtivar = abrirModalAtivar;
    })
</script>