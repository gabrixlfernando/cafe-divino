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


<a href="<?php echo BASE_URL ?>funcionario/adicionar" class="btn btn-primary">Cadastrar Funcionário</a>

<table class="table table-dark table-striped">
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
                        type="button" class="btn btn-primary"><i class="bi bi-pencil-fill"></i></a>
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

<div class="modal fade" id="desativarModal" tabindex="-1" aria-labelledby="desativarModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="desativarModalLabel">Desativar Funcionário</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <h2>Deseja realmente desativar o Funcionário?</h2>
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
</script>