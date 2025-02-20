<?php require_once('template/topo.php');?>
    <body>
        <!-- Header -->
        <?php require_once('template/menu.php');?>
        <?php require_once('template/banner-sobre.php');?>

                

    <main>

       
        <section class="about-info">
            <div class="site">
                <div>
                    <h2>SOBRE NÓS</h2>
                    <h3>Servindo desde 2010</h3>
                </div>

                <div class="row about-text">
                    <div data-aos="fade-down-right"
                        class="col-lg-4 py-0 py-lg-5">
                        <h2 class="mb-3">Nossa História</h2>
                        <h5 class="mb-3">Uma paixão pelo café que une pessoas e
                            sabores</h5>
                        <p>Nossa jornada começou com um simples desejo: criar um
                            espaço onde cada xícara de café contasse uma
                            história. O Café Divíno nasceu do amor por misturar
                            aromas únicos e proporcionar momentos especiais.
                            <br>
                            <br>
                            Desde os grãos selecionados até o ambiente
                            aconchegante, tudo foi pensado para que cada
                            visitante se sinta em casa. Valorizamos o encontro,
                            a conversa e, claro, o prazer de saborear um café
                            preparado com dedicação. Cada detalhe é um convite
                            para desacelerar e apreciar o que a vida tem de
                            melhor.</p>

                    </div>
                    <div data-aos="fade-up" class="col-lg-4 py-5 py-lg-0"
                        style="min-height: 500px;">
                        <div class="position-relative h-100">
                            <img class="w-100 h-100" src="<?php echo BASE_URL?>assets/img/about.png"
                                style="object-fit: cover;">
                        </div>
                    </div>
                    <div data-aos="fade-down-left"
                        class="col-lg-4 py-0 py-lg-5">
                        <h2 class="mb-3">Nossa Visão</h2>
                        <h5 class="mb-3">Transformar cada café em uma
                            experiência inesquecível</h5>
                        <p>No Café Divíno, acreditamos que cada xícara de café
                            tem o poder de transformar um momento comum em algo
                            extraordinário. Nossa visão é criar um ambiente onde
                            cada visitante possa saborear o melhor da arte do
                            café, combinado com um atendimento acolhedor e um
                            espaço inspirador.</p>
                        <h6 class="mb-3"><i
                                class="fa fa-check  mr-3"></i> Café feito com
                            grãos selecionados.</h6>
                        <h6 class="mb-3"><i
                                class="fa fa-check  mr-3"></i>Ambiente
                            aconchegante e moderno.</h6>
                        <h6 class="mb-3"><i
                                class="fa fa-check  mr-3"></i>Atendimento
                            dedicado e personalizado.</h6>

                    </div>
                </div>
            </div>

        </section>

        <section class="our-story">

            <div class="image-story"></div>

            <div class="story-content">
                <div data-aos="fade-up" data-aos-offset="-200" class="story-text">
                    <h2>Descubra</h2>
                    <h3> Nossa História</h3>
                    <p>
                        Ao longo dos anos, o Café Divíno tem sido um refúgio
                        para aqueles que buscam mais do que apenas um café.
                        Fundado com a paixão por criar momentos especiais,
                        cada xícara servida aqui traz consigo uma pitada de
                        tradição e inovação. O aroma que invade o ambiente e
                        as conversas que fluem ao redor das mesas fazem
                        parte de uma experiência que cultivamos com carinho.
                    </p>
                    <p>
                        Desde os primeiros dias, nosso objetivo sempre foi
                        proporcionar mais do que uma simples pausa —
                        queremos que cada visita seja uma jornada pelos
                        sabores que tanto nos orgulhamos em oferecer. Com
                        ingredientes cuidadosamente selecionados e um
                        atendimento que faz você se sentir em casa,
                        acreditamos que o Café Divíno é o lugar onde as
                        melhores memórias são criadas.
                    </p>
                </div>
            </div>

        </section>

        <!-- Depoimentos -->
        <section class="depoimentos">
            <article class="site">
                <div>
                    <h2>O QUE DIZEM SOBRE NÓS</h2>
                    <h3>Conectando pessoas com sabores e experiências</h3>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <div id="testimonial-slider" class="owl-carousel">
                            <div class="testimonial">
                                <p class="description">
                                    "O Café Divino é o meu lugar favorito para começar o dia. O ambiente é acolhedor e o café é simplesmente perfeito!"
                                </p>
                                <div class="pic">
                                    <img src="<?php echo BASE_URL?>assets/img/clientes/depoimento1.png"
                                        alt="Foto de Ana">
                                </div>
                                <h3 class="title">Ana Souza</h3>
                                <span class="post">Advogada</span>
                            </div>
                            <div class="testimonial">
                                <p class="description">
                                    "Adoro vir aqui nas tardes de domingo. Os doces são deliciosos e o atendimento é excepcional."
                                </p>
                                <div class="pic">
                                    <img src="<?php echo BASE_URL?>assets/img/clientes/depoimento2.png"
                                        alt="Foto de Marcos">
                                </div>
                                <h3 class="title">Marina Santos</h3>
                                <span class="post">Escritora</span>
                            </div>
                            <div class="testimonial">
                                <p class="description">
                                    "O ambiente tranquilo e a ótima seleção de chás fazem do Café Divino o lugar ideal para ler um livro e relaxar."
                                </p>
                                <div class="pic">
                                    <img src="<?php echo BASE_URL?>assets/img/clientes/depoimento3.png"
                                        alt="Foto de Beatriz">
                                </div>
                                <h3 class="title">Beatriz Ramos</h3>
                                <span class="post">Professora</span>
                            </div>
                            <div class="testimonial">
                                <p class="description">
                                    "Os smoothies são incríveis! Recomendo o de frutas vermelhas. Sempre que posso, passo aqui para experimentar algo novo."
                                </p>
                                <div class="pic">
                                    <img src="<?php echo BASE_URL?>assets/img/clientes/depoimento4.png"
                                        alt="Foto de Lucas">
                                </div>
                                <h3 class="title">Lucas Ferreira</h3>
                                <span class="post">Designer Gráfico</span>
                            </div>
                            <div class="testimonial">
                                <p class="description">
                                    "Sem dúvida, o melhor cappuccino da cidade. O cuidado com os detalhes faz toda a diferença."
                                </p>
                                <div class="pic">
                                    <img src="<?php echo BASE_URL?>assets/img/clientes/depoimento5.png"
                                        alt="Foto de Marina">
                                </div>
                                <h3 class="title">Marina Santos</h3>
                                <span class="post">Estudante</span>
                            </div>
                        </div>

                    </div>

                </article>
            </section>

            <!-- Chamada para pagina menu -->
            <section class="menu-section">
                <div class="container">
                    <div class="menu-content">
                        <div  id="menuText" data-aos="fade-up"   class="menu-text">
                            <h2>Conheça</h2>
                            <h3>Nosso Menu</h3>
                            <p>
                                Descubra sabores que despertam os sentidos. Do
                                aroma
                                envolvente do café fresco aos doces artesanais,
                                cada
                                item é preparado com cuidado para proporcionar
                                uma
                                experiência única. Venha conferir nossa seleção
                                e se
                                surpreenda com as combinações que vão além do
                                comum.
                            </p>
                            <a href="cardapio.html" class="btn-menu">Veja Todo o
                                Menu</a>
                        </div>
                        <div class="menu-images">
                            <div class="img-grid">
                                <div class="col-md-6">
                                    <span
                                        style="background-image: url(<?php echo BASE_URL?>assets/img/menu-1.png);"
                                        class="img-menu"></span>

                                </div>

                                <div class="col-md-6">
                                    <span
                                        style="background-image: url(<?php echo BASE_URL?>assets/img/menu-2.png);"
                                        class="img-menu"></span>

                                </div>

                                <div class="col-md-6">
                                    <span
                                        style="background-image: url(<?php echo BASE_URL?>assets/img/menu-3.png);"
                                        class="img-menu"></span>

                                </div>

                                <div class="col-md-6">
                                    <span
                                        style="background-image: url(<?php echo BASE_URL?>assets/img/menu-4.png);"
                                        class="img-menu"></span>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- status -->
            <section class="stats-section">
                <div class="container">
                    <div class="stats">
                        <div class="stat-item">
                            <div class="icon-container">
                                <div class="icon-background"></div>
                                <i class="fa-solid fa-mug-hot"></i>
                            </div>
                            <h3 class="counter" data-target="100">0</h3>
                            <p>Receitas Exclusivas</p>
                        </div>

                        <div class="stat-item">
                            <div class="icon-container">
                                <div class="icon-background"></div>
                                <i class="fa-solid fa-mug-hot"></i>
                            </div>
                            <h3 class="counter" data-target="85">0</h3>
                            <p>Prêmios de Qualidade</p>
                        </div>

                        <div class="stat-item">
                            <div class="icon-container">
                                <div class="icon-background"></div>
                                <i class="fa-solid fa-mug-hot"></i>
                            </div>
                            <h3 class="counter" data-target="10567">0</h3>
                            <p>Clientes Satisfeitos</p>
                        </div>

                        <div class="stat-item">
                            <div class="icon-container">
                                <div class="icon-background"></div>
                                <i class="fa-solid fa-mug-hot"></i>
                            </div>
                            <h3 class="counter" data-target="900">0</h3>
                            <p>Xícaras Servidas por Dia</p>
                        </div>
                    </div>
                </div>
            </section>

    </main>

            <!--Rodapé  -->
            <?php require_once('template/rodape.php');?>

            <script>
                function setAosOffset() {
                    const menuText = document.getElementById('menuText');
                    if (window.innerWidth < 768) {
                        menuText.setAttribute('data-aos-offset', '-500');
                    } else {
                        menuText.removeAttribute('data-aos-offset');
                    }
                }

                // Chamar a função ao carregar a página
                window.onload = setAosOffset;
                // Chamar a função ao redimensionar a janela
                window.onresize = setAosOffset;
            </script>
        </body>
    </html>
