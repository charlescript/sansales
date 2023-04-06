<?php
class homeController extends controller {

	private $user;

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $dados = array();

        $products = new Products(); // Instânciei o objeto $products de models/products.php
        $categories = new Categories(); // Instância da classe Categories

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

        $dados['categories'] = $categories->getList();

        $this->loadTemplate('home', $dados);
    }

}

/*
 código define uma classe homeController que herda de controller. O construtor da classe pai é chamado para inicializar a classe e armazenar uma instância da classe Products e Categories em variáveis.

A classe possui apenas um método público chamado index(), que é chamado quando a página inicial é carregada. O método define uma variável $dados como um array vazio e, em seguida, configura as opções de paginação e recupera a lista de produtos usando o método getList() da instância Products. O método getTotal() é usado para obter o número total de produtos na lista.

Em seguida, a variável $dados é atualizada com a lista de produtos, o número total de produtos, o número de páginas e a página atual. A lista de categorias é recuperada usando o método getList() da instância Categories.

Finalmente, o método loadTemplate() é chamado para carregar o arquivo de modelo home.php, passando a variável $dados como um argumento.*/