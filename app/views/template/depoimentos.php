<section class="depoimentos">
    <article class="site">
        <div>
            <h2>O QUE DIZEM SOBRE NÓS</h2>
            <h3>Conectando pessoas com sabores e experiências</h3>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div id="testimonial-slider" class="owl-carousel">

                    <?php foreach ($depoimento as $linha): ?>
                        <div class="testimonial">
                            <p class="description">
                                "<?php echo htmlspecialchars($linha['mens_depoimento'], ENT_QUOTES, 'UTF-8'); ?>"
                            </p>
                            <div class="pic">
                                <img src="<?php
                                            $caminhoImg = $_SERVER['DOCUMENT_ROOT'] . '/cafe-divino/public/uploads/' . $linha['foto_depoimento'];
                                            if ($linha['foto_depoimento'] != "") {
                                                if (file_exists($caminhoImg)) {
                                                    echo "uploads/" . $linha['foto_depoimento'];
                                                } else {
                                                    echo 'uploads/semfoto.png';
                                                }
                                            } else {
                                                echo 'uploads/semfoto.png';
                                            }
                                            ?>"
                                    alt="Foto de Ana">
                            </div>
                            <h3 class="title"><?php echo htmlspecialchars($linha['nome_depoimento'], ENT_QUOTES, 'UTF-8'); ?></h3>
                            <span class="post"><?php echo htmlspecialchars($linha['profissao_depoimento'], ENT_QUOTES, 'UTF-8'); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>

    </article>
</section>