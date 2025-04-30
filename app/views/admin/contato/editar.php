
  <!-- Botão Voltar -->
  <div class="mb-4">
    <a href="<?php echo BASE_URL ?>contato/listar" class="btn text-white" style="background-color: #e69f00;">
    <i class="fa-solid fa-circle-left"></i> Voltar para Contatos
    </a>
  </div>

<div class="container py-4">
  <?php if (isset($_GET['erro'])): ?>
    <div class="alert alert-danger" role="alert">
        <?= htmlspecialchars($_GET['erro']) ?>
    </div>
  <?php endif; ?>

  <div class="row">
    <!-- Mensagem Recebida -->
    <div class="col-md-6 mb-4">
      <div class="card shadow-sm">
        <div class="card-header text-white" style="background-color: #2b1b1b;">
          <h5 class="mb-0">Mensagem Recebida</h5>
        </div>
        <div class="card-body">
          <p><strong>Nome:</strong> <?= $dadosContato['nome_contato'] ?></p>
          <p><strong>Email:</strong> <?= $dadosContato['email_contato'] ?></p>
          <p><strong>Assunto:</strong> <?= $dadosContato['assunto_contato'] ?></p>
          <hr>
          <p><strong>Mensagem:</strong></p>
          <p><?= nl2br($dadosContato['mens_contato']) ?></p>
        </div>
      </div>
    </div>

    <!-- Formulário de Resposta -->
    <div class="col-md-6">
      <div class="card shadow-sm">
        <div class="card-header text-white" style="background-color: #e69f00;">
          <h5 class="mb-0">Responder</h5>
        </div>
        <div class="card-body">
          <form method="POST" action="<?php echo BASE_URL ?>contato/editar/<?php echo $dadosContato['id_contato'] ?>">
            <input type="hidden" name="email_destinatario" value="<?= $dadosContato['email_contato'] ?>">
            <input type="hidden" name="nome_destinatario" value="<?= $dadosContato['nome_contato'] ?>">

            <div class="mb-3">
              <label for="assunto" class="form-label">Assunto da Resposta</label>
              <input type="text" class="form-control" id="assunto" name="assunto" placeholder="Digite o assunto da resposta" required>
            </div>

            <div class="mb-3">
              <label for="resposta" class="form-label">Mensagem</label>
              <textarea class="form-control" id="resposta" name="resposta" rows="8" placeholder="Digite sua resposta..." required style="resize: none;"></textarea>
            </div>

            <button type="submit" class="btn w-100 text-white" style="background-color: #e69f00;">Enviar Resposta</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
