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

<label for="filtro-status">Filtrar por status:</label>
<select id="filtro-status" class="form-select" style="width: 200px; display: inline-block; margin-bottom: 10px;">
    <option value="ATIVO" selected>Ativos</option>
    <option value="DESATIVADO">Desativados</option>
</select>

<a href="<?php echo BASE_URL ?>funcionario/adicionar" class="btn" style="background-color: #e69f00; color: #fff;">Cadastrar Funcionário</a>

<table class="tabela-personalizada">
    <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Endereço</th>
            <th scope="col">Bairro</th>
            <th scope="col">Cidade</th>
            <th scope="col">UF</th>
            <th scope="col">Telefone</th>
            <th scope="col">Email</th>
            <th scope="col">Status</th>
            <th scope="col">Editar</th>
            <th scope="col">Desativar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($funcionarios as $linha): ?>
            <tr>
                <td scope="col"><?php echo htmlspecialchars($linha['nome_funcionario'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td scope="col"><?php echo htmlspecialchars($linha['endereco_funcionario'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td scope="col"><?php echo htmlspecialchars($linha['bairro_funcionario'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td scope="col"><?php echo htmlspecialchars($linha['cidade_funcionario'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td scope="col"><?php echo htmlspecialchars($linha['estado_funcionario'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td scope="col"><?php echo htmlspecialchars($linha['telefone_funcionario'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td scope="col"><?php echo htmlspecialchars($linha['email_funcionario'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td scope="col"><?php echo htmlspecialchars($linha['status_funcionario'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td>
                    <a href="<?php echo BASE_URL ?>funcionario/editar/<?php echo $linha['id_funcionario']; ?>"
                        type="button" class="btn" style="background-color: #e69f00; color: #fff;"><i class="bi bi-pencil-fill"></i></a>
                </td>
                <td>
                    <a href="#"
                        type="button" class="btn btn-danger" title="Desativar"
                        onclick="abrirModal(<?php echo $linha['id_funcionario']; ?>); return false;">
                        <i class="bi bi-trash-fill"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Modal de Ativar Funcionário -->
<div class="modal fade" id="modalAtivarFuncionario" tabindex="-1" aria-labelledby="modalAtivarFuncionarioLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="formAtivarFuncionario">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h5 class="modal-title" id="modalAtivarFuncionarioLabel">Ativar Funcionário</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          Tem certeza que deseja ativar este funcionário?
          <input type="hidden" name="id_funcionario" id="id_funcionario_ativar">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-success" id="btnConfirmarAtivacao">Ativar</button>
        </div>
      </div>
    </form>
  </div>
</div>


<div class="modal fade" id="desativarModal" tabindex="-1" aria-labelledby="desativarModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h1 class="modal-title fs-5" id="desativarModalLabel">Desativar Funcionário</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <h2>Deseja realmente desativar o Funcionário?</h2>
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

    function abrirModalAtivar(id) {
    document.getElementById('id_funcionario_ativar').value = id;
    var modal = new bootstrap.Modal(document.getElementById('modalAtivarFuncionario'));
    modal.show();
}

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('btnConfirmarAtivacao').addEventListener('click', function () {
        const idFuncionario = document.getElementById('id_funcionario_ativar').value;

        fetch('<?php echo BASE_URL; ?>funcionario/ativar', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'id_funcionario=' + encodeURIComponent(idFuncionario)
        })
        .then(response => response.json())
        .then(data => {
            var modal = bootstrap.Modal.getInstance(document.getElementById('modalAtivarFuncionario'));
            modal.hide();

            if (data.sucesso) {
                location.reload(); // recarrega a página na mesma URL
            } else {
                alert('Erro ao ativar: ' + data.mensagem);
            }
        })
        .catch(error => {
            alert('Erro na requisição: ' + error);
        });
    });
});

    
    document.addEventListener('DOMContentLoaded', function() {
        function abrirModal(id_funcionario) {

            if($('#desativarModal').hasClass('show')){
                return
            }
            document.getElementById('idParaDesativar').value = id_funcionario;
            $('#desativarModal').modal('show');
        }

        document.getElementById('btnDesativar').addEventListener('click', function(){
            const idFuncionario = document.getElementById('idParaDesativar').value;
            if(idFuncionario){
                // console.log("id recuperado: " + idFuncionario);
                desativarFuncionario(idFuncionario);
            }
        })

        function desativarFuncionario(idFuncionario){
            fetch(`<?php echo BASE_URL ?>funcionario/desativar/${idFuncionario}`, {
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

    fetch('<?php echo BASE_URL; ?>funcionario/filtrarFuncionarios', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'status=' + encodeURIComponent(statusSelecionado),
    })
    .then(response => response.json())
    .then(funcionarios => {
        const tabela = document.querySelector('.tabela-personalizada');
        
        // Definindo a estrutura do cabeçalho da tabela
        tabela.innerHTML = `
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Bairro</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">UF</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Ativar</th>
                </tr>
            </thead>
            <tbody>
                <!-- As linhas serão inseridas aqui dinamicamente -->
            </tbody>
        `;

        const tbody = tabela.querySelector('tbody');
        tbody.innerHTML = ''; // Limpa o corpo da tabela antes de inserir as novas linhas

        funcionarios.forEach(funcionario => {
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${funcionario.nome_funcionario}</td>
                <td>${funcionario.endereco_funcionario}</td>
                <td>${funcionario.bairro_funcionario}</td>
                <td>${funcionario.cidade_funcionario}</td>
                <td>${funcionario.estado_funcionario}</td>
                <td>${funcionario.telefone_funcionario}</td>
                <td>${funcionario.email_funcionario}</td>
                <td>${funcionario.status_funcionario}</td>
                <td>
                    <a href="<?php echo BASE_URL; ?>funcionario/editar/${funcionario.id_funcionario}" class="btn" style="background-color: #e69f00; color: #fff;">
                        <i class="bi bi-pencil-fill"></i>
                    </a>
                </td>
                <td>
                    ${funcionario.status_funcionario === 'ATIVO' ? `
                        <a href="#" class="btn btn-danger" title="Desativar" onclick="abrirModal(${funcionario.id_funcionario}); return false;">
                            <i class="bi bi-trash-fill"></i>
                        </a>
                    ` : `
                        <a href="#" class="btn btn-success" title="Ativar" onclick="abrirModalAtivar(${funcionario.id_funcionario}); return false;">
                            <i class="fa-solid fa-check"></i>
                        </a>
                    `}
                </td>
            `;
            tbody.appendChild(tr); // Adiciona a linha criada à tabela
        });
    })
    .catch(error => {
        console.error('Erro ao carregar funcionários:', error);
        alert('Erro ao carregar os funcionários. Tente novamente.');
    });
});

</script>