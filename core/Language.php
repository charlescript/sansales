<?php

class Language {
   
    private $l; // Armazena a linguagem
    private $ini;  // Armazena o dicionário

    public function __construct() {
        global $config;  // Essa váriavel global vai pegar o valor do arquivo config.php que está na raiz
        $this->l = $config['default_lang']; // Atributo $l recebe a linguagem padrão

        // Se o usuário tiver definido alguma linguagem e existe o arquivo dessa linguagem
        if(!empty($_SESSION['lang']) && file_exists('lang/'.$_SESSION['lang'].'.ini')) {  
            $this->l = $_SESSION['lang']; // Setarei a que ele definiu
        }

        // Chamar o arquivo ini e concatena o ($l -> dicionário.ini) transforma-lo em array para facilitar o uso
        $this->ini = parse_ini_file('lang/'.$this->l.'.ini');

    } // Fim método construct


    //Método que vai traduzir 
    public function get($word, $return = false){  //Recebe palavra, e por padrão recebe false
        $text = $word;

        if(isset($this->ini[$word])) {  // Se a palavra $word existir dentro do array ini
            $text = $this->ini[$word];  // Texto será traduzido por palavra condizente do dicionário
        }

        if($return) {   // Se o parametro $return for verdaderio
            return $text; // Retorna a palavra traduzida.
        } else {
            echo $text; // Retorna a palavra em sua forma original
        }
    
    } //Fim método GET   

} // Fim classe Language

?>