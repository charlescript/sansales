<?php
class notFoundController extends controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $dados = array();
        
        $this->loadView('404', $dados);
    }
    // Carrega um view 404 caso não encontre a página
    
}