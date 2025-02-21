        <?php require_once('template/topo.php');?>
    <body>
        <!-- Header -->
        <?php require_once('template/menu.php');?>
        <?php require_once('template/banner-sobre.php');?>
               
    <main>
    
        <!-- sobre-nos  -->
        <?php require_once('template/sobre-nos.php');?>

        <!-- nossa historia -->
        <?php require_once('template/nossa-historia.php');?>

        <!-- Depoimentos -->
        <?php require_once('template/depoimentos.php');?>

        <!-- Chamada para pagina menu -->
        <?php require_once('template/chamada-menu.php');?>    

        <!-- status -->
        <?php require_once('template/status.php');?>    

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
