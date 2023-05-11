<?php
class cartController extends controller {

	private $user;

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $store = new Store();
        $products = new Products(); // Instânciei o objeto $products de models/products.php
        $cart = new Cart();
        
        // Abaixo caso não haja sessão ou produtos na sessão o carrinho redireciona para o index
        if( !isset($_SESSION['cart']) || (isset($_SESSION['cart']) && count($_SESSION['cart']) == 0 )) {
            header("Location: ".BASE_URL);
            exit;
        }

        $dados = $store->getTemplateData();

        $dados['list'] = $cart->getList(); // Carrega o carrinho de compras


        $this->loadTemplate('cart', $dados);  // Envia todos os dados para a view/cart.php
    }

    public function del($id,$qt){  // Função para retirar produto do carrinho deletando-o da sessão
        if(!empty($id)){
            // unset($_SESSION['cart'][$id]);
            if($qt == 0 || $qt == 1){
                unset($_SESSION['cart'][$id]);
            }

            if($qt > 1){
                $_SESSION['cart'][$id] = $qt-1;
            } 
        }
        header("Location: ".BASE_URL."cart"); // Retorna para a view/cart ancorado no id items
        exit;
    }

    public function addProductCart($id,$qt){

        if(!empty($id)){
            $_SESSION['cart'][$id] = $qt + 1;
        }

        header("Location: ".BASE_URL."cart");  // Retorna para a view/cart ancorado no id items
        exit;
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