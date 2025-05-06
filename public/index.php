<?php

session_start(); // inicio da sessão antes de qualquer saida

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// carregue as configurações iniciais da aplicação
require_once('../config/config.php');

// carregar as rotas (url da aplicação)

$nucleo = new Rotas();
$nucleo->executar();