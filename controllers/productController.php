<!-- Esse controller é responsável por coletar inserir dados no search campo de pesquisa -->
<?php
class productController extends controller
{

    private $user;

    public function __construct()
    {
        parent::__construct();
    }

    public function index() {
        header("Location: ".BASE_URL);
    } // Fim métod index


    public function open($id)
    {

        $dados = array();

        $products = new Products(); // Instânciei o objeto $products de models/products.php
        $categories = new Categories(); // Instância da classe Categories
        $f = new Filters(); // Instanciando na variavel f, a calsse Filters de models/Filters.php

        $filters = array();

        $info = $products->getProductInfo($id);

        if (count($info) > 0) {

            $dados['product_info'] = $info;
            $dados['product_images'] = $products->getImagesByProductId($id); // Puxa do models/Products.php a imagem do produto

            $dados['categories'] = $categories->getList();

            $dados['filters'] = $f->getFilters($filters);
            $dados['filters_selected'] = array();

            $dados['widget_featured1'] = $products->getList(0, 5, array('featured' => '1'), true);
            $dados['widget_featured2'] = $products->getList(0, 3, array('featured' => '1'), true);
            $dados['widget_sale'] = $products->getList(0, 3, array('sale' => '1'), true);
            $dados['widget_toprated'] = $products->getList(0, 3, array('toprated' => '1'));

            $this->loadTemplate('product', $dados);

        } else {
            header("Location: ".BASE_URL);
        }

    } // Fim método open
}
