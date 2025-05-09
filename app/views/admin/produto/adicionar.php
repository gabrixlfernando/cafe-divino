<div class="mb-4">
    <a href="<?php echo BASE_URL ?>produtos/listar" class="btn text-white" style="background-color: #e69f00;">
    <i class="fa-solid fa-circle-left"></i> Voltar para Produtos
    </a>
  </div>

<h2 class="mb-4">Cadastro de Produto</h2>

<div class="container mt-5">
    <form action="<?php echo BASE_URL ?>produtos/adicionar" method="POST" enctype="multipart/form-data">

        <div class="row d-flex align-items-center">
            <!-- Seção da Imagem (4 colunas) -->
            <div class="col-md-3 d-flex flex-column align-items-center">
                <label for="foto_produto" class="form-label">Foto do Produto</label>
                <img id="previewImg" src="<?php echo BASE_URL ?>uploads/semfoto.png" class="img-thumbnail mb-3" style="cursor: pointer;" width="300" alt="Pré-visualização">
                <input type="file" class="form-control" id="foto_produto" name="foto_produto" accept="image/*" style="display: none;" required>
            </div>

            <!-- Seção dos Campos (8 colunas) -->
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nome_produto" class="form-label">Nome do Produto</label>
                        <input type="text" class="form-control" id="nome_produto" name="nome_produto" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="categoria_produto" class="form-label">Categoria</label>
                        <select class="form-select" id="categoria_produto" name="categoria_produto" required>
                            <option value="">Escolha...</option>
                            <option value="CAFÉ">CAFÉ</option>
                            <option value="CAFÉ GELADO">CAFÉ GELADO</option>
                            <option value="SMOOTHIES">SMOOTHIES</option>
                            <option value="PÃES">PÃES</option>
                            <option value="DOCES">DOCES</option>
                            <option value="CHÁ">CHÁ</option>
                            <option value="CHÁ GELADO">CHÁ GELADO</option>
                            <option value="SHAKES">SHAKES</option>
                            <option value="BEBIDAS VEGANAS">BEBIDAS VEGANAS</option>
                            <option value="ÁGUA">ÁGUA</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="descricao_produto" class="form-label">Descrição</label>
                    <textarea class="form-control" id="descricao_produto" name="descricao_produto" rows="3" required></textarea>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="ml_produto" class="form-label">Quantidade (ml)</label>
                        <input type="number" class="form-control" id="ml_produto" name="ml_produto" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="valor_produto" class="form-label">Valor (R$)</label>
                        <input type="number" class="form-control" id="valor_produto" name="valor_produto" step="0.01" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="status_produto" class="form-label">Status</label>
                        <select class="form-select" id="status_produto" name="status_produto" required>
                            <option value="ATIVO">ATIVO</option>
                            <option value="DESATIVADO">DESATIVADO</option>
                            <option value="INATIVO">INATIVO</option>
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                <button type="submit" class="btn me-2" style="background-color: #e69f00; color: #fff;">Salvar Produto</button>
                <a href="<?php echo BASE_URL ?>produtos/listar" class="btn" style="background-color: #2b1b1b; color: #fff;">Cancelar</a>
                </div>
            </div>
        </div>

    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const visualizarImg = document.getElementById('previewImg');
        const arquivo = document.getElementById('foto_produto');

        visualizarImg.addEventListener('click', function () {
            arquivo.click();
        });

        arquivo.addEventListener('change', function () {
            if (arquivo.files && arquivo.files[0]) {
                let render = new FileReader();
                render.onload = function (e) {
                    visualizarImg.src = e.target.result;
                };
                render.readAsDataURL(arquivo.files[0]);
            }
        });
    });
</script>
