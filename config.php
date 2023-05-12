<?php
require 'environment.php';

global $config;
global $db;

$config = array();
if(ENVIRONMENT == 'development') {
	define("BASE_URL", "http://localhost/sansales/");
	$config['dbname'] = 'db_loja_virtual';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
} else {
	define("BASE_URL", "http://localhost/sansales/");  
	$config['dbname'] = 'db_loja_virtual';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
}

$config['default_lang'] = 'pt-br';
$config['cep_origin'] = '11360100'; //CEP de origem de onde sairá a mercadoria nosso estoque

$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); /* Isso permite que o programa capture e lide com os erros de maneira mais robusta e programática. O atributo é definido usando a constante PDO::ATTR_ERRMODE e o valor PDO::ERRMODE_EXCEPTION, que indica que as exceções serão lançadas em caso de erro. */

?>