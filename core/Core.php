<?php
class Core {
	/*
		A função run() é o ponto de entrada da aplicação e é responsável 
		por fazer o roteamento das requisições HTTP para os controladores 
		apropriados. Ele analisa a URL da solicitação para determinar qual 
		é o controlador e a ação a ser executada, e chama a ação correspondente 
		do controlador.
	*/
	public function run() {
        $url = '/'.(isset($_GET['q'])?$_GET['q']:'');

		$params = array();
		if(!empty($url) && $url != '/') {
			$url = explode('/', $url); /* Divide uma string em várias partes, usando a barra (/) como delimitador ->  se a string for "exemplo.com/pagina/produto", o array resultante terá três elementos: "exemplo.com", "pagina" e "produto".*/
			array_shift($url); 

			$currentController = $url[0].'Controller';
			array_shift($url); /* função que remove e retorna o primeiro elemento de um array -> Como ele já foi armazenado na variável $currentController, não é mais necessário manter no array. */

			if(isset($url[0]) && $url[0] != '/') {
				$currentAction = $url[0];
				array_shift($url);
			} else {
				$currentAction = 'index';
			}

			if(count($url) > 0) {
				$params = $url;
			}

		} else {
			$currentController = 'homeController';
			$currentAction = 'index';
		}

		//Abaixo verifica se o controller recebido existe
		// Se o Controller acessado não existir ele será redirecionado para o controllers/notFoundController
		if(!file_exists('controllers/'.$currentController.'.php')) {  
			$currentController = 'notFoundController';
			$currentAction = 'index';
		}

		$c = new $currentController();

		// Caso o controller exista mas a action não exista, ele é direcionado ao index
		if(!method_exists($c, $currentAction)) {
			$currentAction = 'index';
		}

		call_user_func_array(array($c, $currentAction), $params);

	}

}



/*se código é responsável por iniciar o sistema MVC (Model-View-Controller) 
de um aplicativo web em PHP. A função run() é o ponto de entrada da aplicação 
e é responsável por fazer o roteamento das requisições HTTP para os controladores 
apropriados. Ele analisa a URL da solicitação para determinar qual é o 
controlador e a ação a ser executada, e chama a ação correspondente do 
controlador. Se nenhum controlador ou ação for encontrado, ele redireciona para 
o controlador notFoundController e sua ação index. Esse código implementa um 
padrão conhecido como Front Controller, que é responsável por coordenar o 
processamento da solicitação e gerenciar a resposta a ser enviada de volta para 
o cliente. */