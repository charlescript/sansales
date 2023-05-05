<?php foreach ($subs as $sub) : ?>
    <option <?php echo ($category == $sub['id_categories'])? 'selected=selected': ''; ?> value="<?php echo $sub['id_categories']; ?>"><?php
        for ($q = 0; $q < $level; $q++) echo '-- ';
        echo $sub['nm_categories'];
    ?></option>
  
    <?php
    if (count($sub['subs']) > 0) {
        $this->loadView('search_subcategory', array(
            'subs' => $sub['subs'],
            'level' => $level + 1,
            'category' => $category
        ));
    }
    ?>

<?php endforeach; ?>

<!-- Essa view do PHP é responsável por renderizar opções de seleção HTML para cada subcategoria 
de uma determinada categoria, usando recursividade para percorrer todas as subcategorias dentro 
de subcategorias.

Ela recebe um array chamado $subs como parâmetro, que contém informações sobre as subcategorias a 
serem exibidas, e um parâmetro $level opcional que indica o nível da subcategoria atual no processo
 recursivo.

O código percorre cada subcategoria no array $subs usando um loop foreach e, para cada subcategoria, 
adiciona uma nova opção HTML ao elemento de seleção usando a tag <option>. O valor da opção é o 
id_categories da subcategoria e o texto exibido é o nm_categories, com um prefixo de travessão 
para indicar o nível da subcategoria.

Se a subcategoria atual tiver subcategorias filhas (ou seja, count($sub['subs']) > 0), a view chama 
a si mesma (recursividade) para renderizar essas subcategorias filhas com um novo nível, aumentando
 o valor do parâmetro $level em 1. Dessa forma, todas as subcategorias aninhadas são renderizadas
  corretamente em sua hierarquia dentro do elemento de seleção. -->