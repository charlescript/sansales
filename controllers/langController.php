<?php
class langController extends controller {

	private $user;

    public function __construct() {
        parent::__construct();
    }

    public function index() {}

    public function set($lang){
        $_SESSION['lang'] = $lang;
        header("Location: ".BASE_URL);
    }

}


/* classe chamada langController, que estende a classe controller. 
A classe é usada para configurar a linguagem do site e tem dois métodos públicos:
 index() e set($lang). */


/* método set($lang) recebe um parâmetro $lang que representa a nova 
linguagem do site e define a sessão $_SESSION['lang'] como $lang. Em seguida,
 ele redireciona o usuário de volta para a página inicial do site usando a 
 constante BASE_URL. Esta é uma maneira comum de configurar a linguagem do site
 em uma aplicação web, onde a configuração da sessão pode ser usada em todo o 
 site para exibir o conteúdo na linguagem selecionada pelo usuário. */