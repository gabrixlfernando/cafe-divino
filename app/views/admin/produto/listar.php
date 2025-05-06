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
    <?php unset($_SESSION['mensagem']);
    unset($_SESSION['tipo-msg']); ?>
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
        border-color: #444;
        /* pode ajustar para um tom mais próximo também se quiser */
        padding: 12px;
    }

    .tabela-personalizada thead {
        background-color: #241a1a;
        /* um cabeçalho um pouco mais escuro, combinando */
    }

    .tabela-personalizada tbody tr:nth-child(even) {
        background-color: rgb(37, 24, 24);
        /* levemente mais claro */
    }

    .tabela-personalizada tbody tr:nth-child(odd) {
        background-color: #2b1b1b;
        /* seu fundo principal */
    }

    .tabela-personalizada tbody tr:hover {
        background-color: #3a2e2e;
        /* destaque no hover, ainda dentro da paleta */
    }
</style>

<div class="container-fluid mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <!-- Título da página -->
        <h1 style="color: #e69f00; font-weight: bold;" class="mb-0"><i class="fa-solid fa-mug-hot" style="color: #2b1b1b;"></i> Produtos</h1>

        <div class="d-flex align-items-center gap-3">
            <!-- Filtro de status -->
            <div class="d-flex align-items-center">
                <label for="filtro-status" class="me-2 mb-0">Status:</label>
                <select id="filtro-status" class="form-select" style="width: 150px;">
                    <option value="ATIVO" selected>Ativos</option>
                    <option value="DESATIVADO">Desativados</option>
                </select>
            </div>

            <!-- Filtro de categoria -->
            <div class="d-flex align-items-center">
                <label for="filtro-categoria" class="me-2 mb-0">Categoria:</label>
                <select id="filtro-categoria" class="form-select" style="width: 180px;">
                    <option value="TODAS" selected>Todas</option>
                    <option value="CAFÉ">Café</option>
                    <option value="CAFÉ GELADO">Café Gelado</option>
                    <option value="SMOOTHIES">Smoothies</option>
                    <option value="PÃES">Pães</option>
                    <option value="DOCES">Doces</option>
                    <option value="CHÁ">Chá</option>
                    <option value="CHÁ GELADO">Chá Gelado</option>
                    <option value="SHAKES">Shakes</option>
                    <option value="BEBIDAS VEGANAS">Bebidas Veganas</option>
                    <option value="ÁGUA">Água</option>
                </select>
            </div>

            <!-- Barra de pesquisa -->
            <div class="d-flex align-items-center">
                <div class="input-group" style="width: 250px;">
                    <input type="text" id="pesquisa-nome" class="form-control" placeholder="Pesquisar produto...">
                    <button class="btn btn-outline-secondary" type="button" id="btn-pesquisar">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>

            <!-- Botão Cadastrar -->
            <a href="<?php echo BASE_URL ?>produtos/adicionar" class="btn" style="background-color: #e69f00; color: #fff;">
                Cadastrar Produto
            </a>
        </div>
    </div>
</div>
<table class="tabela-personalizada container-fluid">
    <!-- <thead>
        <tr>
            <th scope="col">Foto</th>
            <th scope="col">Nome</th>
            <th scope="col">Descrição</th>
            <th scope="col">Catergoria</th>
            <th scope="col">ML</th>
            <th scope="col">Valor</th>
            <th scope="col">Status</th>
            <th scope="col">Editar</th>
            <th scope="col">Desativar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($produtos as $linha): ?>
            <tr>
                <td scope="col">

                    <img src="<?php echo BASE_URL ?><?php

                                                    $caminhoImg = 'uploads/' . $linha['foto_produto'];

                                                    if ($linha['foto_produto'] != "") {
                                                        if (file_exists($caminhoImg)) {
                                                            echo "uploads/" . $linha['foto_produto'];
                                                        } else {
                                                            echo 'uploads/semfoto.png';
                                                        }
                                                    } else {
                                                        echo 'uploads/semfoto.png';
                                                    }

                                                    ?>" class="img-thumbnail img-tabela"
                        alt="<?php echo htmlspecialchars($linha['alt_produto'], ENT_QUOTES, 'UTF-8'); ?>" />
                </td>
                <td scope="col"><?php echo htmlspecialchars($linha['nome_produto'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td scope="col" title="<?php echo htmlspecialchars($linha['descricao_produto'], ENT_QUOTES, 'UTF-8'); ?>">
                    <?php
                    $descricao = htmlspecialchars($linha['descricao_produto'], ENT_QUOTES, 'UTF-8');
                    echo mb_strlen($descricao, 'UTF-8') > 50 ? mb_substr($descricao, 0, 50, 'UTF-8') . '...' : $descricao;
                    ?>
                </td>

                <td scope="col"><?php echo htmlspecialchars($linha['categoria_produto'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td scope="col"><?php echo htmlspecialchars($linha['ml_produto'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td scope="col"><?php echo htmlspecialchars($linha['valor_produto'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td scope="col"><?php echo htmlspecialchars($linha['status_produto'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td>
                    <a href="<?php echo BASE_URL ?>produtos/editar/<?php echo $linha['id_produto']; ?>"
                        type="button" class="btn" style="background-color: #e69f00; color: #fff;"><i class="bi bi-pencil-fill"></i></a>
                </td>
                <td>
                    <a href="#"
                        type="button" class="btn btn-danger" title="Desativar"
                        onclick="abrirModal(<?php echo $linha['id_produto']; ?>); return false;">
                        <i class="bi bi-trash-fill"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody> -->
</table>

<div class="modal fade" id="desativarModal" tabindex="-1" aria-labelledby="desativarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h1 class="modal-title fs-5" id="desativarModalLabel">Desativar Produto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h2>Deseja realmente desativar o produto?</h2>
                <input type="hidden" id="idParaDesativar" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="btnDesativar">Desativar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Ativar Produto -->
<div class="modal fade" id="modalAtivarProduto" tabindex="-1" aria-labelledby="modalAtivarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formAtivarProduto">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="modalAtivarLabel">Ativar Produto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    Tem certeza que deseja ativar este produto?
                    <input type="hidden" name="id_produto" id="id_produto_ativar">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success" id="btnConfirmarAtivacao">Ativar</button>
                </div>
            </div>
        </form>
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
        document.getElementById('id_produto_ativar').value = id;
        var modal = new bootstrap.Modal(document.getElementById('modalAtivarProduto'));
        modal.show();
    }

    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('btnConfirmarAtivacao').addEventListener('click', function() {
            const idProduto = document.getElementById('id_produto_ativar').value;

            fetch('<?php echo BASE_URL; ?>produtos/ativar', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'id_produto=' + encodeURIComponent(idProduto)
                })
                .then(response => response.json())
                .then(data => {
                    var modal = bootstrap.Modal.getInstance(document.getElementById('modalAtivarProduto'));
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
        function abrirModal(id_produto) {

            if ($('#desativarModal').hasClass('show')) {
                return
            }
            document.getElementById('idParaDesativar').value = id_produto;
            $('#desativarModal').modal('show');
        }

        document.getElementById('btnDesativar').addEventListener('click', function() {
            const idProduto = document.getElementById('idParaDesativar').value;
            if (idProduto) {
                // console.log("id recuperado: " + idProduto);
                desativarProduto(idProduto);
            }
        })

        function desativarProduto(idProduto) {
            fetch(`<?php echo BASE_URL ?>produtos/desativar/${idProduto}`, {
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



    // Variável para controlar o timeout da pesquisa
    let timeoutPesquisa = null;

    function carregarProdutos() {
        // Cancela o timeout anterior se existir
        if (timeoutPesquisa) {
            clearTimeout(timeoutPesquisa);
        }

        // Configura um novo timeout para executar a busca após 500ms da última digitação
        timeoutPesquisa = setTimeout(() => {
            const statusSelecionado = document.getElementById('filtro-status').value;
            const categoriaSelecionada = document.getElementById('filtro-categoria').value;
            const termoPesquisa = document.getElementById('pesquisa-nome').value.trim();

            // Mostra loading durante a requisição
            const tabela = document.querySelector('.tabela-personalizada');
            tabela.innerHTML = '<div class="text-center my-5"><div class="spinner-border text-warning" role="status"><span class="visually-hidden">Carregando...</span></div></div>';

            fetch('<?php echo BASE_URL; ?>produtos/filtrarProdutos', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'status=' + encodeURIComponent(statusSelecionado) +
                        '&categoria=' + encodeURIComponent(categoriaSelecionada) +
                        '&pesquisa=' + encodeURIComponent(termoPesquisa),
                })
                .then(response => response.json())
                .then(produtos => {
                    const tabela = document.querySelector('.tabela-personalizada');

                    if (produtos.length === 0) {
                        tabela.innerHTML = `
                    <div class="alert alert-warning mt-3">
                        Nenhum produto encontrado com os filtros selecionados.
                    </div>
                `;
                        return;
                    }

                    // Definindo a estrutura do cabeçalho da tabela
                    tabela.innerHTML = `
                <thead>
                    <tr>
                        <th scope="col">Foto</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">ML</th>
                        <th scope="col">Valor</th>
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
                    tbody.innerHTML = '';

                    produtos.forEach(produto => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                    <td>
                    <img 
                        src="<?php echo BASE_URL; ?>uploads/${produto.foto_produto}" 
                        class="img-thumbnail img-tabela" 
                        onerror="this.onerror=null; this.src='<?php echo BASE_URL; ?>uploads/semfoto.png';" 
                    />
                    </td>
                    <td>${produto.nome_produto}</td>
                    <td title="${produto.descricao_produto}">
                    ${produto.descricao_produto.length > 50 ? produto.descricao_produto.substring(0, 50) + '...' : produto.descricao_produto}
                    </td>
                    <td>${produto.categoria_produto}</td>
                    <td>${produto.ml_produto}</td>
                    <td>${produto.valor_produto}</td>
                    <td>${produto.status_produto}</td>
                    <td>
                        <a href="<?php echo BASE_URL; ?>produtos/editar/${produto.id_produto}" class="btn" style="background-color: #e69f00; color: #fff;">
                            <i class="bi bi-pencil-fill"></i>
                        </a>
                    </td>
                    <td>
                        ${produto.status_produto === 'ATIVO' ? `
                            <a href="#" class="btn btn-danger" title="Desativar" onclick="abrirModal(${produto.id_produto}); return false;">
                                <i class="bi bi-trash-fill"></i>
                            </a>
                        ` : `
                            <a href="#" class="btn btn-success" title="Ativar" onclick="abrirModalAtivar(${produto.id_produto}); return false;">
                                <i class="fa-solid fa-check"></i>
                            </a>
                        `}
                    </td>
                `;
                        tbody.appendChild(tr);
                    });
                })
                .catch(error => {
                    console.error('Erro ao carregar produtos:', error);
                    const tabela = document.querySelector('.tabela-personalizada');
                    tabela.innerHTML = `
                <div class="alert alert-danger mt-3">
                    Erro ao carregar os produtos. Por favor, tente novamente.
                </div>
            `;
                });
        }, 500); // 500ms de delay após a última digitação
    }

    // Adiciona os event listeners
    document.getElementById('filtro-status').addEventListener('change', carregarProdutos);
    document.getElementById('filtro-categoria').addEventListener('change', carregarProdutos);

    // Eventos para o campo de pesquisa
    const campoPesquisa = document.getElementById('pesquisa-nome');
    campoPesquisa.addEventListener('input', carregarProdutos); // Dispara ao digitar
    campoPesquisa.addEventListener('keyup', function(e) {
        if (e.key === 'Escape') {
            this.value = '';
            carregarProdutos();
        }
    });

    // Botão de pesquisa ainda funciona
    document.getElementById('btn-pesquisar').addEventListener('click', carregarProdutos);



    // Carrega os produtos inicialmente
    carregarProdutos();
</script>