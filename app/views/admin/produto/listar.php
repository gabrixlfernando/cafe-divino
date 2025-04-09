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

<a href="<?php echo BASE_URL ?>produtos/adicionar" class="btn btn-primary">Cadastrar Produto</a>

<table class="table table-dark table-striped">
    <thead>
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


                    <!-- <?php
                            $caminhoBase = "http://localhost/cafe-divino/public/uploads/";
                            $caminhoFoto = $caminhoBase . $linha['foto_produto'];

                            if ($linha['foto_produto'] != '' && file_exists($caminhoFoto)) {
                                $urlFoto = $caminhoFoto;
                            } else {
                                $urlFoto = $caminhoFoto . 'semfoto.png';
                            }

                            // $urlFoto = $linha['foto_produto'] != '' && file_exists($caminhoFoto) ? $caminhoFoto : $caminhoBase . 'semfoto.png';

                            ?>

                    <img src="<?php echo $urlFoto; ?>" /> -->

                    <img src="<?php echo BASE_URL ?><?php

                                                    $caminhoImg = $_SERVER['DOCUMENT_ROOT'] . '/cafe-divino/public/uploads/' . $linha['foto_produto'];

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
                <td scope="col"><?php echo htmlspecialchars($linha['descricao_produto'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td scope="col"><?php echo htmlspecialchars($linha['categoria_produto'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td scope="col"><?php echo htmlspecialchars($linha['ml_produto'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td scope="col"><?php echo htmlspecialchars($linha['valor_produto'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td scope="col"><?php echo htmlspecialchars($linha['status_produto'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td>
                    <a href="<?php echo BASE_URL ?>produtos/editar/<?php echo $linha['id_produto']; ?>"
                        type="button" class="btn btn-primary"><i class="bi bi-pencil-fill"></i></a>
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
    </tbody>
</table>

<div class="modal fade" id="desativarModal" tabindex="-1" aria-labelledby="desativarModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="desativarModalLabel">Desativar Produto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <h2>Deseja realmente desativar o produto?</h2>
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
        function abrirModal(id_produto) {

            if($('#desativarModal').hasClass('show')){
                return
            }
            document.getElementById('idParaDesativar').value = id_produto;
            $('#desativarModal').modal('show');
        }

        document.getElementById('btnDesativar').addEventListener('click', function(){
            const idProduto = document.getElementById('idParaDesativar').value;
            if(idProduto){
                // console.log("id recuperado: " + idProduto);
                desativarProduto(idProduto);
            }
        })

        function desativarProduto(idProduto){
            fetch(`<?php echo BASE_URL ?>produtos/desativar/${idProduto}`, {
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