<?php
class categoriesController extends controller
{

    private $user;

    public function __construct()
    {
        parent::__construct();
    }

    public function index() {
        header("Location:".BASE_URL);
    }


    public function enter($id)
    {
        $dados = array();

        $products = new Products();
        $categories = new Categories();
        $dados['category_name'] = $categories->getCategoryName($id);

        if (!empty($dados['category_name'])) {
            $currentPage = 1;
            $offset = 0;
            $limit = 3;

            if (!empty($_GET['p'])) {
                $currentPage = $_GET['p'];
            }

            $offset = ($currentPage * $limit) - $limit;

            $filters = array('category'=>$id);

            $dados['category_filter'] = $categories->getCategoryTree($id);

            $dados['list'] = $products->getList($offset, $limit, $filters);
            $dados['totalItems'] = $products->getTotal($filters);
            $dados['numberOfPages'] = ceil($dados['totalItems'] / $limit); // Divido a quantidade de produtos retornados pelo limite de produtos por página
            $dados['currentPage'] = $currentPage;

            $dados['id_category'] = $id;

            $dados['categories'] = $categories->getList();
            $this->loadTemplate('categories', $dados);
        } else {
            header("Location:" . BASE_URL);
        }
    }
}


/*A função index() simplesmente redireciona o usuário para a página principal (BASE_URL).

A função enter($id) é responsável por mostrar os produtos de uma categoria específica (identificada pelo $id). Primeiramente, a função instancia os objetos Products e Categories, e obtém o nome da categoria através do método getCategoryName() de Categories. Se a categoria existe, a função prossegue.

A variável $currentPage armazena o número da página atual. A variável $limit armazena o número máximo de produtos por página. Se existir um valor para a variável $_GET['p'] (ou seja, se o usuário clicou em outra página da lista), $currentPage é atualizado com o valor recebido. A variável $offset é calculada a partir de $currentPage e $limit.

A variável $filters é um array associativo que contém a categoria da qual se deseja obter os produtos. A função getCategoryTree() de Categories é usada para obter uma árvore de categorias que contém a categoria atual e suas subcategorias. A lista de produtos é obtida a partir do método getList() de Products, que recebe os parâmetros $offset, $limit e $filters.

A função getTotal() de Products é usada para obter o número total de produtos na categoria atual. Essa informação é usada para calcular o número total de páginas ($numberOfPages) e a página atual ($currentPage).

A variável $dados é um array associativo que contém todas as informações que serão usadas na página. Esse array é passado como segundo parâmetro para o método loadTemplate() da classe Controller, que carrega o template "categories.php" e insere os dados no local apropriado. O método getList() de Categories é usado para obter uma lista de todas as categorias, que são armazenadas na variável $dados['categories'].

Se a categoria não existir, o usuário é redirecionado para a página principal. */