<?php
class homeController extends controller {

	private $user;

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $store = new Store();
        $products = new Products(); // Instânciei o objeto $products de models/products.php
        $categories = new Categories(); // Instância da classe Categories
        $f = new Filters(); // Instanciando na variave f, a calsse Filters de models/Filters.php

        $dados = $store->getTemplateData();

        $filters = array();
        if(!empty($_GET['filter']) && is_array($_GET['filter'])) {
            $filters = $_GET['filter'];
        }

        $currentPage = 1;
        $offset = 0;
        $limit = 3;

        if(!empty($_GET['p'])){
            $currentPage = $_GET['p'];
        }

        $offset = ($currentPage * $limit) - $limit;

        $dados['list'] = $products->getList($offset, $limit, $filters); //Acionei o método geList da classe para retornar a consulta do banco de dados
        $dados['totalItems'] = $products->getTotal($filters);
        $dados['numberOfPages'] = ceil($dados['totalItems'] / $limit); // Divido a quantidade de produtos retornados pelo limite de produtos por página
        $dados['currentPage'] = $currentPage;

        $dados['filters'] = $f->getFilters($filters);
        $dados['filters_selected'] = $filters;

        $dados['searchTerm'] = '';
        $dados['category'] = '';

        $dados['sidebar'] = true;

        $this->loadTemplate('home', $dados);
    }

}