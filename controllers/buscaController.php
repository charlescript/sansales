<!-- Esse controller é responsável por coletar inserir dados no search campo de pesquisa -->
<?php
class buscaController extends controller
{

    private $user;

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $dados = array();

        $products = new Products(); // Instânciei o objeto $products de models/products.php
        $categories = new Categories(); // Instância da classe Categories
        $f = new Filters(); // Instanciando na variave f, a calsse Filters de models/Filters.php

        if (!empty($_GET['s'])) {
            $searchTerm = $_GET['s'];
            $category = $_GET['category'];

            $filters = array();
            if (!empty($_GET['filter']) && is_array($_GET['filter'])) {
                $filters = $_GET['filter'];
            }

            $filters['searchTerm'] = $searchTerm;
            $filters['category'] = $category;

            $currentPage = 1;
            $offset = 0;
            $limit = 3;

            if (!empty($_GET['p'])) {
                $currentPage = $_GET['p'];
            }

            $offset = ($currentPage * $limit) - $limit;

            $dados['list'] = $products->getList($offset, $limit, $filters); //Acionei o método geList da classe para retornar a consulta do banco de dados
            $dados['totalItems'] = $products->getTotal($filters);
            $dados['numberOfPages'] = ceil($dados['totalItems'] / $limit); // Divido a quantidade de produtos retornados pelo limite de produtos por página
            $dados['currentPage'] = $currentPage;

            $dados['categories'] = $categories->getList();

            $dados['filters'] = $f->getFilters($filters);
            $dados['filters_selected'] = $filters;

            $dados['searchTerm'] = $searchTerm;
            $dados['category'] = $category;

            $this->loadTemplate('busca', $dados);
        } else {
            header("Location: ".BASE_URL);
        }

    }
}
