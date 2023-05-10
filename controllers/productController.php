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


    public function open($id) {
        $store = new Store();
        $products = new Products(); // Instânciei o objeto $products de models/products.php
        $categories = new Categories(); // Instância da classe Categories
      
        $dados = $store->getTemplateData();

        $info = $products->getProductInfo($id);

        if (count($info) > 0) {

            $dados['product_info'] = $info;
            $dados['product_images'] = $products->getImagesByProductId($id); // Puxa do models/Products.php a imagem do produto
            $dados['product_options'] = $products->getOptionsByProductId($id);
            $dados['product_rates'] = $products->getRates($id, 5);

            $this->loadTemplate('product', $dados);
        } else {
            header("Location: ".BASE_URL);
        }

    } // Fim método open
}
