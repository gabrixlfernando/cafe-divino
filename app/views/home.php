    <?php require_once('template/topo.php');?>

    <body>
        <!-- Header -->
        
    <?php require_once('template/menu.php');?>
    <?php require_once('template/banner-home.php');?>

        <main>
              <!-- Seção de Destaques -->
            <section  class="container my-5 p-0" id="destaques">
                <div class="row">
                    <!-- Imagem de Produto 1 -->
                    <div data-aos="fade-up" class="col-md-4 mb-4">
                        <div class="card">
                            <img src="<?php echo BASE_URL?>assets/img/variedadecafe.png" class="card-img-top" alt="Imagem Produto 1">
                            <div class="card-body">
                                <h5 class="card-title">Cafés Artesanais</h5>
                                <p class="card-text">Feitos com grãos selecionados.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Imagem de Produto 2 -->
                    <div data-aos="fade-up" data-aos-delay="300" class="col-md-4 mb-4">
                        <div class="card">
                            <img src="<?php echo BASE_URL?>assets/img/rosquinhas.png" class="card-img-top" alt="Imagem Produto 2">
                            <div class="card-body">
                                <h5 class="card-title">Sobremesas Incríveis</h5>
                                <p class="card-text">Perfeitas para acompanhar o seu café.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Texto e Botão -->

                    <div data-aos="fade-up" data-aos-delay="600" class="col-md-4 mb-4">
                        <div class="card bg-dark text-white destaque-card especial-card">
                            <div class="card-body">
                                <h3 class="card-title">Nossos Destaques</h3>
                                <p class="card-text">Explore nossos produtos mais populares e descubra sabores únicos.</p>
                                <a href="cardapio.html" class="btn btn-warning">Ver Mais Produtos</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <!-- Seção Sobre -->

            <section class="sobre">
                <article class="site">
                    <div data-aos="zoom-in-down" data-aos-delay="200" class="sobre-texto">
                        <h2>Sobre Nós</h2>
                        <h3>Desde 2010, alcançando a posição Nº1 ao redor do mundo.</h3>
                        <p>Nós nos esforçamos para entregar os melhores produtos com qualidade excepcional. Com mais de 15 anos de experiência, oferecemos o melhor café para nossos clientes.</p>
                        <a href="sobre.html" class="sobre-botao">Saiba Mais</a>
                    </div>
                    
                    <div data-aos="zoom-in"   class="sobre-imagem">
                        <img src="<?php echo BASE_URL?>assets/img/sobre-nos.png" alt="Café Divino">

                        <div class="sobre-destaque">
                            15 Anos de <br> Experiência
                        </div>
                    </div>

                   
                </article>
                
            </section>
            



    
            <!-- Seção Produtos Populares -->
            <section class="popular-products text-center py-5">
                <h2 class="section-title">Descubra</h2>
                <h3 class="section-subtitle">PRODUTOS MAIS POPULARES</h3>
                <p class="section-description">Explore nossos produtos mais vendidos e favoritos do público.</p>
                
                <div class="container">
                    <div class="row">
                         <!-- Produto 1: Torta de Limão -->
                         <div data-aos="fade-up" data-aos-delay="300" class="col-md-3">
                            <div class="card">
                                <img src="<?php echo BASE_URL?>assets/img/produtos/torta-limao.png" class="card-img-top" alt="Torta de Limão">
                                <div class="card-body">
                                    <h5 class="card-title">Torta de Limão</h5>
                                    <p class="card-text">Refrescante e perfeita.</p>
                                    <p class="card-price">15,00</p>
                                </div>
                            </div>
                        </div>

                       
            
                        <!-- Produto 2: Cappuccino -->
                        <div data-aos="fade-up" data-aos-delay="500" class="col-md-3">
                            <div class="card">
                                <img src="<?php echo BASE_URL?>assets/img/produtos/cappuccino-produto.png" class="card-img-top" alt="Cappuccino">
                                <div class="card-body">
                                    <h5 class="card-title">Cappuccino</h5>
                                    <p class="card-text">Cremoso e delicioso.</p>
                                    <p class="card-price">12,00</p>
                                </div>
                            </div>
                        </div>

                         <!-- Produto 3: Brownie -->
                         <div data-aos="fade-up" data-aos-delay="800" class="col-md-3">
                            <div class="card">
                                <img src="<?php echo BASE_URL?>assets/img/produtos/brownie-produto.png" class="card-img-top" alt="Brownie">
                                <div class="card-body">
                                    <h5 class="card-title">Brownie</h5>
                                    <p class="card-text">Chocolate em sua melhor forma.</p>
                                    <p class="card-price">9,00</p>
                                </div>
                            </div>
                        </div>
            
                        <!-- Produto 4: Café Expresso -->
                        <div data-aos="fade-up" data-aos-delay="1000" class="col-md-3">
                            <div class="card">
                                <img src="<?php echo BASE_URL?>assets/img/produtos/espresso.png" class="card-img-top" alt="Café Expresso">
                                <div class="card-body">
                                    <h5 class="card-title">Café Expresso</h5>
                                    <p class="card-text">O clássico café que todos amam.</p>
                                    <p class="card-price">7,00</p>
                                </div>
                            </div>
                        </div>
            
                       
                    </div>
                </div>
            </section>
            

             <!-- chamada para ação -->
            <section class="container-fluid action">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <div class="p-5 text-white rounded">
                                        <h2>Descubra Nossos Cafés Especiais</h2>
                                        <p>Experimente o melhor café da cidade!</p>
                                        <a href="cardapio.html" class="btn btn-light">Saiba Mais</a>
                                    </div>
                                </div>
                            </div>
            </section>

        <!-- Seção de Informações Adicionais -->
            <section class="container exp">
                <div class="row">
                    <!-- Texto e Botão -->
                    <div data-aos="fade-up" class="col-md-6 d-flex flex-column justify-content-center">
                        <h3 class="mb-3">Experiência Exclusiva no Café Divino</h3>
                        <p class="mb-3">Descubra o que torna o Café Divino um lugar especial. Nossa dedicação à excelência em cada xícara, desde a seleção dos melhores grãos até o atendimento impecável, cria uma experiência única que você não vai encontrar em nenhum outro lugar. Venha saborear nossas especialidades e sentir o verdadeiro prazer de um café feito com paixão.</p>
                        <a href="sobre.html" class="btn btn-dark">Saiba Mais</a>
                    </div>

                    <!-- Imagem -->
                    <div class="col-md-6">
                        <img src="<?php echo BASE_URL?>assets/img/graos.png" alt="Descrição da Imagem" class="img-fluid">
                    </div>
                </div>
            </section>



            
    

        </main>

      
        


    <!-- Rodapé -->
    <?php require_once('template/rodape.php');?>
        
    </body>

</html>
