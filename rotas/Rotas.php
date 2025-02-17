<?php
 
class Rotas{
 
    // Metodo inicializar todas as rotas
    public function executar(){
 
        $url = '/';
 
        // var_dump($url);
 
 
        // Verifica se a varivavel está definida  na $_GET
        if(isset($_GET['url'])){
            $url .= $_GET['url'];
            // /senac/ti26
 
        }
 
        // var_dump($url);
 
        // Definir  uma variável para armazenar  parametros
        $parametro = array();
 
 
    // Verifique se a URL não está vazia e não é só uma /
    if(!empty($url) &&  $url != '/'){
       
        // Controller       (Controller)
        // Ação             (Método)
        // Informação Única (Parametro)    
 
 
        // servicos/nomeServico/1
        $url = explode('/', $url);
 
        array_shift($url); // Removera primeira posição do ARRAY
 
        $controladorAtual = ucfirst($url[0]) . 'Controller';
 
 
        array_shift($url);    
        // var_dump($url);
 
        if(isset($url[0]) && !empty($url)){
            $acaoAtual = $url[0];
            // var_dump("Nome da ação atual: " . $acaoAtual);
        }else{
            $acaoAtual = "Index";
            // var_dump("Nome da ação atual: ". $acaoAtual);
        }
 
 
 
        // Os parametros
        // Count - Conta todos os elementos do array ou de um objeto
        if(count($url) > 0){
            // var_dump(count($url));
 
        }
    }else{
        $controladorAtual = 'HomeController';
        $acaoAtual = 'index';
        // var_dump($controladorAtual);
        // var_dump($acaoAtual);
    }
 
 
    // Verificar se o arquivo do CONTROLLER e a AÇÃO (método) existe
    if(!file_exists('../app/controllers/' . $controladorAtual . '.php') || !method_exists($controladorAtual, $acaoAtual)){
            // var_dump('Não, ele não existe ' . $controladorAtual);
            // var_dump('Não existe o metodo', $acaoAtual);

            //Se não existir definir um Controller e um Método padrão
            $controladorAtual = 'ErroController';
            $acaoAtual = 'index';
    }


    $controller = new $controladorAtual();


    call_user_func_array(array($controller, $acaoAtual), $parametro);


    
}
}