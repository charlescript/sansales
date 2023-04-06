<?php
session_start();
require 'config.php';

spl_autoload_register(function ($class){
    if(file_exists('controllers/'.$class.'.php')) {
            require_once 'controllers/'.$class.'.php';
    } elseif(file_exists('models/'.$class.'.php')) {
            require_once 'models/'.$class.'.php';
    } elseif(file_exists('core/'.$class.'.php')) {
            require_once 'core/'.$class.'.php';
    }
});

$core = new Core();
$core->run();
?>


<!-- inicializa a sessão e carrega as configurações do projeto através do 
arquivo config.php. Em seguida, registra a função de autoload, que permite 
carregar automaticamente as classes necessárias para o funcionamento do projeto, 
dependendo do nome da classe a ser carregada. Por fim, instancia a classe Core e 
chama o método run() que é responsável por tratar a URL da requisição e invocar o
controller e a action adequados para processar a requisição. Em resumo, é a 
parte central da aplicação que coordena todas as outras partes do projeto. -->