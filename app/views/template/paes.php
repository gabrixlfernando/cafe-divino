<section class="products">
      <article class="site">
        <h2>PÃES</h2>
        <div class="menu-section">
          <div class="menu-items">

          <?php foreach ($paes as $linha): ?>
            <div class="menu-item">
              <img src="<?php                           
                            $caminhoImg = $_SERVER['DOCUMENT_ROOT'] . '/cafe-divino/public/uploads/'. $linha['foto_produto'];
                            if($linha['foto_produto'] != ""){
                                if(file_exists($caminhoImg)){
                                    echo "uploads/". $linha['foto_produto'];
                                }else{
                                    echo 'uploads/semfoto.png';
                                }
                            }else{
                                echo 'uploads/semfoto.png';
                            }             
                            ?>"
              alt="<?php echo htmlspecialchars( $linha['alt_produto'], ENT_QUOTES, 'UTF-8'); ?>">
              <div class="menu-info">
              <h3><?php echo htmlspecialchars( $linha['nome_produto'], ENT_QUOTES, 'UTF-8'); ?></h3>
                <p><?php echo htmlspecialchars( $linha['descricao_produto'], ENT_QUOTES, 'UTF-8'); ?></p>
              </div>
              <div class="price"><?php echo htmlspecialchars( $linha['valor_produto'], ENT_QUOTES, 'UTF-8'); ?></div>
            </div>
            <?php endforeach; ?>   

          </div>
        </div>

        <div class="info-box">
          <p>
            <span class="icon">⚠</span> NOSSOS PRODUTOS SÃO FRESCOS E DE
            PRODUÇÃO DIÁRIA. RECOMENDAMOS O CONSUMO IMEDIATO!<br>
            EM CASO DE TRANSPORTE, MANTÊ-LOS REFRIGERADOS. IMAGENS MERAMENTE
            ILUSTRATIVAS.
          </p>
        </div>
      </article>
    </section>