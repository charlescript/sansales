<?php
class Core {

	public function run() {
        $url = '/'.(isset($_GET['q'])?$_GET['q']:'');

		$params = array();
		if(!empty($url) && $url != '/') {
			$url = explode('/', $url);
			array_shift($url);

			$currentController = $url[0].'Controller';
			array_shift($url);

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