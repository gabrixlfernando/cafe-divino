<?php

//definir URL BASE 

define('BASE_URL', 'http://localhost/cafe-divino/public/');

// Configuração da data base
define('DB_HOST', 'smpsistema.com.br');
define('DB_NAME', 'u283879542_cafedivino');
define('DB_USER', 'u283879542_cafedivino');
define('DB_PASS', '@CafeTi26');


// Configuração do email

define('EMAIL_HOST', 'smtp.hostinger.com');
define('EMAIL_PORT', '465');
define('EMAIL_USER', 'cafedivino@smpsistema.com.br');
define('EMAIL_PASS', 'CafeDivino@01');

// Sistema de autoload das classes
spl_autoload_register(function ($class){
    if(file_exists('../app/controllers/' .$class. '.php' )){
        require_once('../app/controllers/' .$class. '.php');
    }

    if(file_exists('../app/models/' .$class. '.php' )){
        require_once('../app/models/' .$class. '.php');
    }

    if(file_exists('../rotas/' .$class. '.php' )){
        require_once('../rotas/' .$class. '.php');
    }


});