<?php
class cartController extends controller {

	private $user;

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $store = new Store();
        $products = new Products(); // Instânciei o objeto $products de models/products.php
  
        $dados = $store->getTemplateData();


        $this->loadTemplate('cart', $dados);
    }

    public function add() {
        
        if(!empty($_POST['id_product'])){

            $id = intval($_POST['id_product']);
            $qt = intval($_POST['qt_product']);

            if(!isset($_SESSION['cart'])) { // Verifica se a sessão do carrinho foi criada
                $_SESSION['cart'] = array(); // Se não foi criado eu crio a sessão como um array vazio
            }

            if(isset($_SESSION['cart'][$id])) { // Se o produto está adicionado no carrinho
                $_SESSION['cart'][$id] += $qt; // Adiciona a quantidade
            } else {
                $_SESSION['cart'][$id] = $qt;  // Caso contrário a quantidade permanece o padrão 1
            }

            header("Location: ".BASE_URL."cart"); // Manda o usuario para o carrinho
            exit;

        }
    } // fim função add

}