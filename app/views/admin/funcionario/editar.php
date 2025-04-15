<h2 class="mb-4">Edição de Funcionário</h2>

<div class="container mt-5">
    <form action="<?php echo BASE_URL ?>funcionario/editar/<?php echo $dadosFuncionario['id_funcionario'] ?>" method="POST" enctype="multipart/form-data">

        <div class="row d-flex align-items-center">
            <!-- Dados Pessoais -->
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nome_funcionario" class="form-label">Nome Completo</label>
                        <input type="text" class="form-control" id="nome_funcionario" name="nome_funcionario" required value="<?php echo $dadosFuncionario['nome_funcionario']; ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cpf_funcionario" class="form-label">CPF</label>
                        <input type="text" class="form-control" id="cpf_funcionario" name="cpf_funcionario" required value="<?php echo $dadosFuncionario['cpf_funcionario']; ?>">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="endereco_funcionario" class="form-label">Endereço</label>
                    <input type="text" class="form-control" id="endereco_funcionario" name="endereco_funcionario" required value="<?php echo $dadosFuncionario['endereco_funcionario']; ?>">
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="bairro_funcionario" class="form-label">Bairro</label>
                        <input type="text" class="form-control" id="bairro_funcionario" name="bairro_funcionario" required value="<?php echo $dadosFuncionario['bairro_funcionario']; ?>">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="cidade_funcionario" class="form-label">Cidade</label>
                        <input type="text" class="form-control" id="cidade_funcionario" name="cidade_funcionario" required value="<?php echo $dadosFuncionario['cidade_funcionario']; ?>">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="estado_funcionario" class="form-label">Estado</label>
                        <input type="text" class="form-control" id="estado_funcionario" name="estado_funcionario" required value="<?php echo $dadosFuncionario['estado_funcionario']; ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="telefone_funcionario" class="form-label">Telefone</label>
                        <input type="text" class="form-control" id="telefone_funcionario" name="telefone_funcionario" required value="<?php echo $dadosFuncionario['telefone_funcionario']; ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email_funcionario" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email_funcionario" name="email_funcionario" required value="<?php echo $dadosFuncionario['email_funcionario']; ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="senha_funcionario" class="form-label">Senha</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="senha_funcionario" name="senha_funcionario" value="<?php echo $dadosFuncionario['senha_funcionario']; ?>">
                            <button class="btn btn-outline-secondary" type="button" id="toggleSenha">
                                <i class="fas fa-eye" id="iconeOlho"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="status_funcionario" class="form-label">Status</label>
                        <select class="form-select" id="status_funcionario" name="status_funcionario" required>
                            <option value="<?php echo $dadosFuncionario['status_funcionario']; ?>"><?php echo $dadosFuncionario['status_funcionario']; ?></option>
                            <option value="ATIVO">ATIVO</option>
                            <option value="INATIVO">INATIVO</option>
                            <option value="BLOQUEADO">BLOQUEADO</option>
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success me-2">Salvar Alterações</button>
                    <a href="<?php echo BASE_URL ?>funcionario/listar" class="btn btn-secondary">Cancelar</a>
                </div>
            </div>
        </div>

    </form>
</div>


<script>
    document.getElementById('toggleSenha').addEventListener('click', function () {
        const campoSenha = document.getElementById('senha_funcionario');
        const icone = document.getElementById('iconeOlho');

        if (campoSenha.type === 'password') {
            campoSenha.type = 'text';
            icone.classList.remove('fa-eye');
            icone.classList.add('fa-eye-slash');
        } else {
            campoSenha.type = 'password';
            icone.classList.remove('fa-eye-slash');
            icone.classList.add('fa-eye');
        }
    });
</script>