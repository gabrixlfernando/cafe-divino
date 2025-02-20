<?php require_once('template/topo.php');?>


  <body>
 
    <!-- Header -->
    <?php require_once('template/menu.php');?>
    <?php require_once('template/banner-cardapio.php');?>

        

    <main>

    
    <!-- filtro -->
    <section class="filter">
      <article class="site">
        <div class="filter-container">
          <button class="filter-button">NOVIDADES</button>
          <button class="filter-button">CAFÉS</button>
          <button class="filter-button">SMOOTHIES</button>
          <button class="filter-button">PÃES</button>
          <button class="filter-button">DOCES</button>
          <button class="filter-button">CHÁS</button>
          <button class="filter-button">SHAKES</button>
          <button class="filter-button">BEBIDAS VEGANAS</button>
          <button class="filter-button">ÁGUA</button>
        </div>
      </article>
    </section>

    <!-- Novidades -->

    <section data-aos="fade-up" class="products">
      <article class="site">
        <h2>NOVIDADES</h2>
        <div class="menu-section">
          <div class="menu-items">

            <div class="menu-item">
              <img src="<?php echo BASE_URL?>assets/img/produtos/smoothie-melancia.png" alt="Smoothie de Melancia">
              <div class="menu-info">
                <h3>SMOOTHIE DE MELANCIA</h3>
                <p>400 ml</p>
                <p>Combinação de melancia, hortelã e limão. Ideal para dias
                  quentes.</p>
              </div>
              <div class="price">19,00</div>
            </div>

            <div class="menu-item">
              <img src="<?php echo BASE_URL?>assets/img/produtos/torta-limao.png" alt="Torta de Limão">
              <div class="menu-info">
                <h3>TORTA DE LIMÃO</h3>
                <p>Deliciosa torta de limão com base crocante e creme de limão.
                  Porção individual.</p>
              </div>
              <div class="price">15,00</div>
            </div>

            <div class="menu-item">
              <img src="<?php echo BASE_URL?>assets/img/produtos/pao-de-queijo.png" alt="Pão de Queijo">
              <div class="menu-info">
                <h3>PÃO DE QUEIJO</h3>
                <p>Tradicional pão de queijo mineiro, quentinho e crocante.
                  Porção com 6 unidades.</p>
              </div>
              <div class="price">12,00</div>
            </div>

            <div class="menu-item">
              <img src="<?php echo BASE_URL?>assets/img/produtos/brownie-produto.png" alt="Brownie">
              <div class="menu-info">
                <h3>BROWNIE</h3>
                <p>Brownie de chocolate com nozes, servido com sorvete de creme.
                  Delícia irresistível!</p>
              </div>
              <div class="price">9,00</div>
            </div>

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

    <!-- Cafés -->

    <section class="products">
      <article class="site">
        <h2>CAFÉS TRADICIONAIS</h2>
        <div class="menu-section">
          <h2>CAFÉS &gt; QUENTES</h2>
          <div class="menu-items">
            <div class="menu-item">
              <img src="<?php echo BASE_URL?>assets/img/produtos/espresso.png" alt="Café Espresso">
              <div class="menu-info">
                <h3>CAFÉ EXPRESSO</h3>
                <p>50 ml<br>
                  O tradicional café expresso, servido puro e com intensidade
                  única.</p>
              </div>
              <div class="price">7,00</div>
            </div>

            <div class="menu-item">
              <img src="<?php echo BASE_URL?>assets/img/produtos/cappuccino-produto.png" alt="Cappuccino">
              <div class="menu-info">
                <h3>CAPPUCCINO</h3>
                <p>150 ml<br>
                  Espresso com leite vaporizado, finalizado com uma camada de
                  espuma e canela.</p>
              </div>
              <div class="price">12,00</div>
            </div>

            <div class="menu-item">
              <img src="<?php echo BASE_URL?>assets/img/produtos/mocha.png" alt="Mocha">
              <div class="menu-info">
                <h3>MOCHA</h3>
                <p>180 ml<br>
                  Espresso combinado com leite vaporizado e calda de chocolate,
                  finalizado com chantilly.</p>
              </div>
              <div class="price">15,00</div>
            </div>

            <div class="menu-item">
              <img src="<?php echo BASE_URL?>assets/img/produtos/macchiatto.png" alt="Macchiato">
              <div class="menu-info">
                <h3>MACCHIATO</h3>
                <p>170 ml<br>Espresso com uma leve camada de espuma de leite, perfeito
                  para quem aprecia intensidade.</p>
              </div>
              <div class="price">10,00</div>
            </div>

            <!-- Adicione mais itens conforme necessário -->
          </div>
        </div>

        <div class="menu-section">
          <h2>CAFÉS &gt; GELADOS</h2>
          <div class="menu-items">
            <div class="menu-item">
              <img src="<?php echo BASE_URL?>assets/img/produtos/iced-coffee.png" alt="Café Gelado">
              <div class="menu-info">
                <h3>CAFÉ GELADO</h3>
                <p>300 ml<br>
                  Espresso sobre gelo, refrescante e com o sabor intenso do
                  café.</p>
              </div>
              <div class="price">12,00</div>
            </div>

            <div class="menu-item">
              <img src="<?php echo BASE_URL?>assets/img/produtos/iced-mocha.png" alt="Iced Mocha">
              <div class="menu-info">
                <h3>ICED MOCHA</h3>
                <p>300 ml<br>
                  Espresso gelado combinado com calda de chocolate, leite e
                  cubos de gelo.</p>
              </div>
              <div class="price">18,00</div>
            </div>

            <div class="menu-item">
              <img src="<?php echo BASE_URL?>assets/img/produtos/AFFOGATO.png" alt="Affogato">
              <div class="menu-info">
                <h3>AFFOGATO</h3>
                <p>150 ml<br>
                  Uma bola de sorvete de baunilha coberta com espresso quente.
                  Uma deliciosa combinação quente e fria.</p>
              </div>
              <div class="price">20,00</div>
            </div>

            <div class="menu-item">
              <img src="<?php echo BASE_URL?>assets/img/produtos/frappuccino.png" alt="Frappuccino">
              <div class="menu-info">
                <h3>FRAPPUCCINO</h3>
                <p>350 ml<br>
                  Bebida gelada de café com leite e gelo batido, coberta com
                  chantilly.</p>
              </div>
              <div class="price">22,00</div>
            </div>

            <!-- Adicione mais itens conforme necessário -->
          </div>
        </div>
      </article>
    </section>

    <!-- Smoothies -->
    <section class="products">
      <article class="site">
        <h2>SMOOTHIES</h2>
        <div class="menu-section">
          <div class="menu-items">

            <div class="menu-item">
              <img src="<?php echo BASE_URL?>assets/img/produtos/smooth-morangobanana.png"
                alt="Smoothie de Morango e Banana">
              <div class="menu-info">
                <h3>SMOOTHIE DE MORANGO E BANANA</h3>
                <p>400 ml<br>
                  Smoothie cremoso feito com morango, banana e leite.</p>
              </div>
              <div class="price">18,00</div>
            </div>

            <div class="menu-item">
              <img src="<?php echo BASE_URL?>assets/img/produtos/smoothie-verde.png" alt="Smoothie Verde Detox">
              <div class="menu-info">
                <h3>SMOOTHIE VERDE DETOX</h3>
                <p>400 ml<br>
                  Smoothie refrescante com espinafre, maçã, gengibre e água de
                  coco.</p>
              </div>
              <div class="price">20,00</div>
            </div>

            <div class="menu-item">
              <img src="<?php echo BASE_URL?>assets/img/produtos/smoothie-tropical.png" alt="Smoothie Tropical">
              <div class="menu-info">
                <h3>SMOOTHIE TROPICAL</h3>
                <p>400 ml<br>
                  Combinação de manga, abacaxi e leite de coco.</p>
              </div>
              <div class="price">22,00</div>
            </div>

            <div class="menu-item">
              <img src="<?php echo BASE_URL?>assets/img/produtos/smmothie-frutasvermelhas.png"
                alt="Smoothie de Frutas Vermelhas">
              <div class="menu-info">
                <h3>SMOOTHIE DE FRUTAS VERMELHAS</h3>
                <p>400 ml<br>
                  Frutas vermelhas (morango, amora, framboesa) com iogurte
                  natural.</p>
              </div>
              <div class="price">21,00</div>
            </div>

            <!-- Adicione mais itens conforme necessário -->
          </div>
        </div>
      </article>
    </section>

    <!--Pães  -->
    <section class="products">
      <article class="site">
        <h2>PÃES</h2>
        <div class="menu-section">
          <div class="menu-items">

            <div class="menu-item">
              <img src="<?php echo BASE_URL?>assets/img/produtos/CROISSANT.png" alt="Croissant Simples">
              <div class="menu-info">
                <h3>CROISSANT SIMPLES</h3>
                <p>Croissant folhado tradicional, crocante por fora e macio por
                  dentro.</p>
              </div>
              <div class="price">10,00</div>
            </div>

            <div class="menu-item">
              <img src="<?php echo BASE_URL?>assets/img/produtos/ciabatto.png" alt="Pão de Queijo Recheado">
              <div class="menu-info">
                <h3>CIABATTA</h3>
                <p>Pão italiano leve e crocante, perfeito para acompanhar uma
                  bebida.</p>
              </div>
              <div class="price">14,00</div>
            </div>

            <div class="menu-item">
              <img src="<?php echo BASE_URL?>assets/img/produtos/baguete.png" alt="Baguete Artesanal">
              <div class="menu-info">
                <h3>BAGUETE ARTESANAL</h3>
                <p>Baguete de fermentação natural, feita diariamente.</p>
              </div>
              <div class="price">12,00</div>
            </div>

            <div class="menu-item">
              <img src="<?php echo BASE_URL?>assets/img/produtos/pao-integral.png"
                alt="Pão Integral com Sementes">
              <div class="menu-info">
                <h3>PÃO INTEGRAL COM SEMENTES</h3>
                <p>Pão integral macio, feito com uma mistura de sementes.</p>
              </div>
              <div class="price">9,00</div>
            </div>

            <!-- Adicione mais itens conforme necessário -->
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

    <!-- Doces -->

    <section class="products">
      <article class="site">
        <h2>DOCES</h2>
        <div class="menu-section">
          <div class="menu-items">

            <div class="menu-item">
              <img src="<?php echo BASE_URL?>assets/img/produtos/cookies.png" alt="Cookie de Chocolate">
              <div class="menu-info">
                <h3>COOKIE DE CHOCOLATE</h3>
                <p>Cookie crocante com pedaços de chocolate ao leite e meio
                  amargo.</p>
              </div>
              <div class="price">7,00</div>
            </div>

            <div class="menu-item">
              <img src="<?php echo BASE_URL?>assets/img/produtos/donut-chocolate.png" alt="Torta de Limão">
              <div class="menu-info">
                <h3>DONUT DE CHOCOLATE</h3>
                <p>Donut macio coberto com ganache de chocolate belga e
                  granulados crocantes.</p>
              </div>
              <div class="price">10,00</div>
            </div>

            <div class="menu-item">
              <img src="<?php echo BASE_URL?>assets/img/produtos/tiramisu.png" alt="Brownie de Nozes">
              <div class="menu-info">
                <h3>TIRAMISU</h3>
                <p>Camadas de biscoito embebido em café, intercaladas
                  com um creme leve à base de mascarpone e finalizado com cacau
                  em pó.</p>
              </div>
              <div class="price">9,00</div>
            </div>

            <div class="menu-item">
              <img src="<?php echo BASE_URL?>assets/img/produtos/donut-rosa.png"
                alt="Bolo de Cenoura com Cobertura de Chocolate">
              <div class="menu-info">
                <h3>DONUT DE FRAMBOESA</h3>
                <p>Donut macio com cobertura de glacê rosa de framboesa.
                  Perfeito para
                  quem adora sabores frutados!</p>

              </div>
              <div class="price">12,00</div>
            </div>

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

    <!-- Chás -->

    <section class="products">
      <article class="site">
        <h2>CHÁS</h2>
        <div class="menu-section">
          <h2>CHÁS &gt; QUENTES</h2>
          <div class="menu-items">

            <div class="menu-item">
              <img src="<?php echo BASE_URL?>assets/img/produtos/cha-hortela.png" alt="Chá Verde com Limão">
              <div class="menu-info">
                <h3>CHÁ DE MENTA COM LIMÃO</h3>
                <p>400 ml<br>
                  Chá refrescante de menta com um toque de limão, perfeito para
                  estimular os sentidos. </p>
              </div>
              <div class="price">10,00</div>
            </div>

            <div class="menu-item">
              <img src="<?php echo BASE_URL?>assets/img/produtos/cha-gengibre.png" alt="Matcha Berry">
              <div class="menu-info">
                <h3>CHÁ DE GENGIBRE COM MEL</h3>
                <p>400 ml<br> 
                  Chá de gengibre picante com um toque de mel, perfeito para
                  aquecer e fortalecer o sistema imunológico. </p>
              </div>
              <div class="price">20,00</div>
            </div>

            <div class="menu-item">
              <img src="<?php echo BASE_URL?>assets/img/produtos/cha-maca.png" alt="Jasmin Green Tea Quente">
              <div class="menu-info">
                <h3>CHÁ DE MAÇÃ COM CANELA</h3>
                <p>400 ml<br>
                  Uma infusão aromática de maçãs frescas e canela,
                  proporcionando um sabor reconfortante e envolvente. </p>
              </div>
              <div class="price">9,00</div>
            </div>

            <!-- Adicione mais itens conforme necessário -->
          </div>
        </div>

        <div class="menu-section">
          <h2>CHÁS &gt; GELADOS</h2>
          <div class="menu-items">
            <div class="menu-item">
              <img src="<?php echo BASE_URL?>assets/img/produtos/cha-pessegogelado.png" alt="Chá de Pêssego">
              <div class="menu-info">
                <h3>CHÁ GELADO DE PÊSSEGO</h3>
                <p>450 ml<br>
                  Refrescante combinação de chá verde de jasmin com xarope de
                  pêssego e pedras de gelo.</p>

              </div>
              <div class="price">16,00</div>
            </div>

            <div class="menu-item">
              <img src="<?php echo BASE_URL?>assets/img/produtos/cha-mategelado.png" alt="Chá Mate Gelado">
              <div class="menu-info">
                <h3>CHÁ MATE GELADO</h3>
                <p>400 ml<br>
                  Chá mate tradicional servido gelado com limão ou pêssego.</p>
              </div>
              <div class="price">10,00</div>
            </div>

            <div class="menu-item">
              <img src="<?php echo BASE_URL?>assets/img/produtos/cha-vemelhasgelado.png"
                alt="Chá de Frutas Vermelhas Gelado">
              <div class="menu-info">
                <h3>CHÁ DE FRUTAS VERMELHAS GELADO</h3>
                <p>400 ml<br>
                  Chá gelado com uma infusão de frutas vermelhas, refrescante e
                  levemente doce.</p>
              </div>
              <div class="price">12,00</div>
            </div>

            <!-- Adicione mais itens conforme necessário -->
          </div>
        </div>
      </article>
    </section>

    <!-- Shakes  -->
    <section class="products">
      <article class="site">
        <h2>SHAKES</h2>
        <div class="menu-section">
          <div class="menu-items">

            <div class="menu-item">
              <img src="<?php echo BASE_URL?>assets/img/produtos/shake-chocolate.png" alt="Shake de Chocolate">
              <div class="menu-info">
                <h3>SHAKE DE CHOCOLATE</h3>
                <p>400 ml<br>
                  Delicioso Shake cremoso de chocolate com cobertura de
                  chantilly.</p>
              </div>
              <div class="price">22,00</div>
            </div>

            <div class="menu-item">
              <img src="<?php echo BASE_URL?>assets/img/produtos/shakke-morango.png" alt="Shake de Morango">
              <div class="menu-info">
                <h3>SHAKE DE MORANGO</h3>
                <p>400 ml<br>
                  Shake refrescante de morango, feito com morangos frescos e
                  sorvete de baunilha.</p>
              </div>
              <div class="price">20,00</div>
            </div>

            <div class="menu-item">
              <img src="<?php echo BASE_URL?>assets/img/produtos/shake-baunilia.png"
                alt="Shake de Baunilha com Cookies">
              <div class="menu-info">
                <h3>SHAKE DE BAUNILHA COM COOKIES</h3>
                <p>400 ml<br>
                  Shake de baunilha com pedaços de cookies e cobertura de
                  chocolate.</p>
              </div>
              <div class="price">24,00</div>
            </div>

            <div class="menu-item">
              <img src="<?php echo BASE_URL?>assets/img/produtos/shake-café.png" alt="Shake de Café">
              <div class="menu-info">
                <h3>SHAKE DE CAFÉ</h3>
                <p>400 ml<br>
                  Shake gelado com sabor de café, perfeito para os amantes de
                  café.</p>
              </div>
              <div class="price">25,00</div>
            </div>

            <!-- Adicione mais itens conforme necessário -->
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

    <!-- Bebida vegana -->
    <section class="products">

      <article class="site">
        <h2>BEBIDAS VEGANAS</h2>
        <div class="menu-section">
          <div class="menu-items">

            <div class="menu-item">
              <img src="<?php echo BASE_URL?>assets/img/produtos/latte-aveia.png" alt="Suco Verde Detox">
              <div class="menu-info">
                <h3>LATTE DE AVEIA</h3>
                <p>300 ml<br>
                  Creme de leite de aveia quente com espresso, resultando em
                  uma bebida suave e cremosa.</p>
              </div>
              <div class="price">12,00</div>
            </div>

            <div class="menu-item">
              <img src="<?php echo BASE_URL?>assets/img/produtos/smoothie-abacate.png" alt="Smoothie de Abacate">
              <div class="menu-info">
                <h3>SMOOTHIE DE ABACATE</h3>
                <p>400 ml<br>
                  Smoothie cremoso de abacate com leite de amêndoas e mel.</p>
              </div>
              <div class="price">14,00</div>
            </div>

            <div class="menu-item">
              <img src="<?php echo BASE_URL?>assets/img/produtos/cappuccino-amendoas.png"
                alt="Chá Gelado de Hibisco">
              <div class="menu-info">
                <h3>CAPPUCCINO DE AMÊNDOAS</h3>
                <p>300 ml<br>
                  Espresso cremoso com leite de amêndoas, polvilhado com canela
                  ou cacau em pó.</p>
              </div>
              <div class="price">12,00</div>
            </div>

            <div class="menu-item">
              <img src="<?php echo BASE_URL?>assets/img/produtos/smooth-uva.png" alt="Água de Coco Natural">
              <div class="menu-info">
                <h3>SMOOTHIE DE UVA</h3>
                <p>300 ml<br>
                  Um smoothie refrescante de uvas frescas, batido com leite de
                  amêndoa e uma pitada de baunilha.</p>
              </div>
              <div class="price">10,00</div>
            </div>

            <!-- Adicione mais itens conforme necessário -->
          </div>
        </div>
      </article>
    </section>

    <!-- água -->
    <section class="products">
      <article class="site">
        <h2>ÁGUA</h2>
        <div class="menu-section">
          <div class="menu-items">

            <div class="menu-item">
              <img src="<?php echo BASE_URL?>assets/img/produtos/agua.png" alt="Água Mineral">
              <div class="menu-info">
                <h3>ÁGUA MINERAL</h3>
                <p>500 ml<br>
                  Água mineral natural, refrescante e purificada.</p>
              </div>
              <div class="price">5,00</div>
            </div>

            <div class="menu-item">
              <img src="<?php echo BASE_URL?>assets/img/produtos/agua-gas.png" alt="Água com Gás">
              <div class="menu-info">
                <h3>ÁGUA COM GÁS</h3>
                <p>500 ml<br>
                  Água com gás, ideal para quem prefere uma opção
                  efervescente.</p>
              </div>
              <div class="price">6,00</div>
            </div>

            <!-- Adicione mais itens conforme necessário -->
          </div>
        </div>
      </article>
    </section>

    </main>

    <!-- Rodapé -->
    <?php require_once('template/rodape.php');?>

  </body>
</html>
