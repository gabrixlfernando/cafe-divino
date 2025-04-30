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


<div class="container-fluid mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <!-- Título da página -->
        <h1 style="color: #e69f00; font-weight: bold;" class="mb-0">Contatos</h1>
        
        <div class="d-flex align-items-center gap-3">
            <!-- Filtro de status -->
            <div class="d-flex align-items-center">
                <label for="filtro-status" class="me-2 mb-0">Filtrar por:</label>
                <select id="filtro-status" class="form-select" style="width: 200px;">
                    <option value="AGUARDANDO" selected>Aguardando Resposta</option>
                    <option value="RESPONDIDO">Respondidos</option>
                </select>
            </div>
        </div>
    </div>
</div>

<table class="tabela-personalizada">
    <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Assunto</th>
            <th scope="col">Mensagem</th>
            <th scope="col">Status</th>
            <th scope="col">Ações</th> <!-- Coluna unificada -->
        </tr>
    </thead>
    <tbody>
        <?php foreach ($contatos as $linha): ?>
            <tr>
                <td scope="col"><?php echo htmlspecialchars($linha['nome_contato'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td scope="col"><?php echo htmlspecialchars($linha['assunto_contato'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td scope="col"><?php echo htmlspecialchars($linha['mens_contato'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td scope="col"><?php echo htmlspecialchars($linha['status_contato'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td>
                    <?php if ($linha['status_contato'] === 'AGUARDANDO'): ?>
                        <a href="<?php echo BASE_URL ?>contato/editar/<?php echo $linha['id_contato']; ?>"
                            type="button" class="btn" style="background-color: #e69f00; color: #fff;" title="Responder">
                            <i class="bi bi-pencil-fill"></i>
                        </a>
                    <?php else: ?>
                        <a href="#"
                            type="button" class="btn btn-danger" title="Desativar"
                            onclick="abrirModal(<?php echo $linha['id_contato']; ?>); return false;">
                            <i class="bi bi-trash-fill"></i>
                        </a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="modal fade" id="desativarModal" tabindex="-1" aria-labelledby="desativarModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h1 class="modal-title fs-5" id="desativarModalLabel">Desativar Contato</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <h2>Deseja realmente desativar o Contato?</h2>
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
        function abrirModal(id_contato) {

            if($('#desativarModal').hasClass('show')){
                return
            }
            document.getElementById('idParaDesativar').value = id_contato;
            $('#desativarModal').modal('show');
        }

        document.getElementById('btnDesativar').addEventListener('click', function(){
            const idContato = document.getElementById('idParaDesativar').value;
            if(idContato){
                // console.log("id recuperado: " + idContato);
                desativarContato(idContato);
            }
        })

        function desativarContato(idContato){
            fetch(`<?php echo BASE_URL ?>contato/desativar/${idContato}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(response => {
                if(!response.ok){
                    throw new Error(`Erro HTTP: ${response.status}`);
             }
             return response.json();
            })
            .then(data => {
                $('#desativarModal').modal('hide');
                location.reload();
            })

            .catch(error =>{
                alert("Erro na requisição. Verifique a conexão com o servidor.");
            })
        }


        window.abrirModal = abrirModal;
    })


    document.getElementById('filtro-status').addEventListener('change', function() {
    const statusSelecionado = this.value;

    fetch('<?php echo BASE_URL; ?>contato/filtrarContatos', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'status=' + encodeURIComponent(statusSelecionado),
        })
        .then(response => response.json())
        .then(contatos => {
            const tbody = document.querySelector('.tabela-personalizada tbody');
            tbody.innerHTML = '';

            contatos.forEach(contato => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${contato.nome_contato}</td>
                    <td>${contato.assunto_contato}</td>
                    <td>${contato.mens_contato}</td>
                    <td>${contato.status_contato}</td>
                    <td>
                        ${contato.status_contato === 'AGUARDANDO' ? `
                            <a href="<?php echo BASE_URL ?>contato/editar/${contato.id_contato}"
                                class="btn" style="background-color: #e69f00; color: #fff;" title="Responder">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                        ` : `
                            <a href="#" class="btn btn-danger" title="Desativar"
                                onclick="abrirModal(${contato.id_contato}); return false;">
                                <i class="bi bi-trash-fill"></i>
                            </a>
                        `}
                    </td>
                `;
                tbody.appendChild(tr);
            });
        })
        .catch(error => {
            console.error('Erro ao carregar contatos:', error);
            alert('Erro ao carregar os contatos. Tente novamente.');
        });
});
</script>