<?php
class homeController extends controller {

	private $user;

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $dados = array();

        $products = new Products(); // Instânciei o objeto $products de models/products.php

        $dados['list'] = $products->getList(); //Acionei o método geList da classe para retornar a consulta do banco de dados
        
        $this->loadTemplate('home', $dados);
    }

}