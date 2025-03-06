<section class="products">
      <article class="site">
        <h2>ÁGUA</h2>
        <div class="menu-section">
          <div class="menu-items">

          <?php foreach ($agua as $linha): ?>
            <div class="menu-item">
              <img src="<?php echo BASE_URL?>assets/img/produtos/agua.png" alt="Água Mineral">
              <div class="menu-info">
                <h3><?php echo htmlspecialchars( $linha['nome_produto'], ENT_QUOTES, 'UTF-8'); ?></h3>
                <p><?php echo htmlspecialchars( $linha['ml_produto'], ENT_QUOTES, 'UTF-8'); ?> ml<br>
                <?php echo htmlspecialchars( $linha['descricao_produto'], ENT_QUOTES, 'UTF-8'); ?></p>
              </div>
              <div class="price"><?php echo htmlspecialchars( $linha['valor_produto'], ENT_QUOTES, 'UTF-8'); ?></div>
            </div>
          <?php endforeach; ?>  
      
          </div>
        </div>
      </article>
    </section>