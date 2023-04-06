<?php
class homeController extends controller {

	private $user;

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $dados = array();

        $products = new Products(); // Instânciei o objeto $products de models/products.php

        $currentPage = 1;
        $offset = 0;
        $limit = 3;

        if(!empty($_GET['p'])){
            $currentPage = $_GET['p'];
        }

        $offset = ($currentPage * $limit) - $limit;

        $dados['list'] = $products->getList($offset, $limit); //Acionei o método geList da classe para retornar a consulta do banco de dados
        $dados['totalItems'] = $products->getTotal();
        $dados['numberOfPages'] = ceil($dados['totalItems'] / $limit); // Divido a quantidade de produtos retornados pelo limite de produtos por página
        $dados['currentPage'] = $currentPage;

        $this->loadTemplate('home', $dados);
    }

}