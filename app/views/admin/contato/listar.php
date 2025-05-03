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
        <h1 style="color: #e69f00; font-weight: bold;" class="mb-0"><i class="fa-solid fa-square-phone" style="color: #2b1b1b;"></i> Contatos</h1>
        
        <div class="d-flex align-items-center gap-3">
            <!-- Filtro de status -->
            <div class="d-flex align-items-center">
                <label for="filtro-status" class="me-2 mb-0">Filtrar por:</label>
                <select id="filtro-status" class="form-select" style="width: 200px;">
                    <option value="AGUARDANDO" selected>Aguardando Resposta</option>
                    <option value="RESPONDIDO">Respondidos</option>
                </select>
            </div>
            
            <!-- Barra de pesquisa -->
            <div class="d-flex align-items-center">
                <div class="input-group" style="width: 250px;">
                    <input type="text" id="pesquisa-contato" class="form-control" placeholder="Pesquisar contato...">
                    <button class="btn btn-outline-secondary" type="button" id="btn-pesquisar">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<table class="tabela-personalizada container-fluid">
    <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Assunto</th>
            <th scope="col">Mensagem</th>
            <th scope="col">Status</th>
            <th scope="col">Ação</th> <!-- Coluna unificada -->
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
        <h1 class="modal-title fs-5" id="desativarModalLabel">Deletar Contato</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <h2>Deseja realmente deletar o Contato?</h2>
      <input type="hidden" id="idParaDesativar" value="">
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      <button type="button" class="btn btn-danger" id="btnDesativar">Deletar</button>
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


   // Variável para controlar o timeout da pesquisa
let timeoutPesquisa = null;

function carregarContatos() {
    // Cancela o timeout anterior se existir
    if (timeoutPesquisa) {
        clearTimeout(timeoutPesquisa);
    }
    
    // Configura um novo timeout para executar a busca após 500ms da última digitação
    timeoutPesquisa = setTimeout(() => {
        const statusSelecionado = document.getElementById('filtro-status').value;
        const termoPesquisa = document.getElementById('pesquisa-contato').value.trim();

        // Mostra loading durante a requisição
        const tabela = document.querySelector('.tabela-personalizada');
        tabela.innerHTML = '<div class="text-center my-5"><div class="spinner-border text-warning" role="status"><span class="visually-hidden">Carregando...</span></div></div>';

        fetch('<?php echo BASE_URL; ?>contato/filtrarContatos', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'status=' + encodeURIComponent(statusSelecionado) +
                  '&pesquisa=' + encodeURIComponent(termoPesquisa),
        })
        .then(response => response.json())
        .then(contatos => {
            const tabela = document.querySelector('.tabela-personalizada');
            
            if (contatos.length === 0) {
                tabela.innerHTML = `
                    <div class="alert alert-warning mt-3">
                        Nenhum contato encontrado com os filtros selecionados.
                    </div>
                `;
                return;
            }

            // Definindo a estrutura da tabela
            tabela.innerHTML = `
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Assunto</th>
                        <th scope="col">Mensagem</th>
                        <th scope="col">Status</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- As linhas serão inseridas aqui dinamicamente -->
                </tbody>
            `;

            const tbody = tabela.querySelector('tbody');
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
                            <a href="#" class="btn btn-danger" title="Excluir"
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
            const tabela = document.querySelector('.tabela-personalizada');
            tabela.innerHTML = `
                <div class="alert alert-danger mt-3">
                    Erro ao carregar os contatos. Por favor, tente novamente.
                </div>
            `;
        });
    }, 500); // 500ms de delay após a última digitação
}

// Adiciona os event listeners
document.getElementById('filtro-status').addEventListener('change', carregarContatos);

// Eventos para o campo de pesquisa
const campoPesquisa = document.getElementById('pesquisa-contato');
campoPesquisa.addEventListener('input', carregarContatos); // Dispara ao digitar
campoPesquisa.addEventListener('keyup', function(e) {
    if (e.key === 'Escape') {
        this.value = '';
        carregarContatos();
    }
});

// Botão de pesquisa ainda funciona
document.getElementById('btn-pesquisar').addEventListener('click', carregarContatos);

// Carrega os contatos inicialmente
carregarContatos();
</script>