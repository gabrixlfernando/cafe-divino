<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/img/logo/logo-café-divíno3.svg" type="image/x-icon">
    <title>Café Divino | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/login.css">
</head>
<body>
    <div class="background-wrap">
        <div class="background"></div>
    </div>
      
    <form id="accesspanel" action="<?php echo BASE_URL; ?>login/autenticar" method="post">
        <h1 id="litheader">CAFÉ DIVINO</h1>
        <div class="img">
            <img src="<?php echo BASE_URL; ?>assets/img/logo/logo-café-divíno3.svg" alt="">
        </div>
       
        <div class="inset">
            <?php if (isset($_SESSION['erro_login'])): ?>
                <div class="alert alert-danger"><?= $_SESSION['erro_login'] ?></div>
                <?php unset($_SESSION['erro_login']); ?>
            <?php endif; ?>
            
            <p>
                <input type="text" name="email" id="email" placeholder="Email" required>
            </p>
            <p>
                <input type="password" name="senha" id="password" placeholder="Senha" required>
            </p>
            <div style="text-align: center;">
                <div class="checkboxouter">
                    <input type="checkbox" name="rememberme" id="remember" value="Remember">
                    <label class="checkbox"></label>
                </div>
                <label for="remember">Lembre de mim por 14 dias.</label>
            </div>
        </div>
        <p class="p-container">
            <input type="submit" name="Login" id="go" value="Acessar">
        </p>
    </form>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var state = false;

            $('#accesspanel').on('submit', function(e) {
                e.preventDefault();

                state = !state;

                if (state) {
                    document.getElementById("litheader").className = "poweron";
                    document.getElementById("go").className = "";
                    document.getElementById("go").value = "Iniciando...";
                    
                    // Submete o form após a animação
                    setTimeout(() => {
                        this.submit();
                    }, 1000);
                } else {
                    document.getElementById("litheader").className = "";
                    document.getElementById("go").className = "denied";
                    document.getElementById("go").value = "Acesso Negado";
                }
            });
        });
    </script>
</body>
</html>