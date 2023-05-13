<?php
class psckttransparentController extends controller {

	private $user;

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $store = new Store();
        $products = new Products(); // Instânciei o objeto $products de models/products.php
              
        $dados = $store->getTemplateData();

        // psckttransparent significa pague seguro checkout transparent
        $this->loadTemplate('cart_psckttransparent', $dados);  // Envia todos os dados para a view/cart.php
    }

    

} // Fim classe psckttransparentController