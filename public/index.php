<?php

// carregue as configurações iniciais da aplicação
require_once('../config/config.php');

// carregar as rotas (url da aplicação)

$nucleo = new Rotas();
$nucleo->executar();