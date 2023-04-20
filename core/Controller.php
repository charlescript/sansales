<?php
class controller {

	protected $db;
	protected $lang;

	public function __construct() {
		global $config;
		$this->lang = new Language();  // Carrega a classe Language no construtor de todos os controllers chamados
	}
	
	/* "loadView" é usada para carregar uma view (uma página HTML) e 
	passar dados para essa view. Esses dados são armazenados em um array 
	chamado $viewData e são extraídos para variáveis separadas por meio da 
	função "extract". */
	public function loadView($viewName, $viewData = array()) {
		extract($viewData);
		include 'views/'.$viewName.'.php';
	}

	/*loadTemplate" é usada para carregar um template HTML que envolve a página 
	HTML de uma view. Esse template pode conter elementos HTML comuns a todas as
	 páginas do site, como cabeçalho, rodapé e menu. */
	public function loadTemplate($viewName, $viewData = array()) {
		include 'views/template.php';
	}

	/*loadViewInTemplate" é usada para carregar uma view dentro do template HTML.
	 Essa função também recebe um array de dados que são extraídos para variáveis
	  separadas na view. */
	public function loadViewInTemplate($viewName, $viewData) {
		extract($viewData);
		include 'views/'.$viewName.'.php';
	}

}