<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logo/logo-café-divíno3.svg"
    type="image/x-icon">
    <title>Café Divino | Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="background-wrap">
        <div class="background"></div>
      </div>
      
      <form id="accesspanel" action="login" method="post">
        <h1 id="litheader">CAFÉ DIVINO</h1>
        <div class="img">
            <img src="img/logo/logo-café-divíno3.svg" alt="">
        </div>
       
        <div class="inset">
          <p>
            <input type="text" name="username" id="email" placeholder="Email">
          </p>
          <p>
            <input type="password" name="password" id="password" placeholder="Senha">
          </p>
          <div style="text-align: center;">
            <div class="checkboxouter">
              <input type="checkbox" name="rememberme" id="remember" value="Remember">
              <label class="checkbox"></label>
            </div>
            <label for="remember">Lembre de mim por 14 dias.</label>
          </div>
          <input class="loginLoginValue" type="hidden" name="service" value="login" />
        </div>
        <p class="p-container">
          <input type="submit" name="Login" id="go" value="Acessar">
        </p>
      </form>


      <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
      <script>
        $(document).ready(function() {

            var state = false;

            //$("input:text:visible:first").focus();

            $('#accesspanel').on('submit', function(e) {

                e.preventDefault();

                state = !state;

                if (state) {
                    document.getElementById("litheader").className = "poweron";
                    document.getElementById("go").className = "";
                    document.getElementById("go").value = "Iniciando...";
                }else{
                    document.getElementById("litheader").className = "";
                    document.getElementById("go").className = "denied";
                    document.getElementById("go").value = "Acesso Negado";
                }

            });

            });
      </script>
</body>
</html>