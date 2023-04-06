<?php foreach ($subs as $sub) : ?>

    <li>
        <a href="<?php echo BASE_URL.'categories/enter/'.$sub['id_categories'];?>">
            <?php 
                for($q=0; $q<$level; $q++) echo '-- ';
                echo $sub['nm_categories'];
            ?>
        </a>
    </li>

    <?php
        if(count($sub['subs']) > 0) {
            $this->loadView('menu_subcategory', array(
                'subs' => $sub['subs'],
                'level' => $level + 1
            ));
        }
    ?>

<?php endforeach; ?>

<!-- Esse código é responsável por criar um menu de categorias hierárquicas 
recursivas. O código começa com um loop "foreach" que percorre cada uma das 
categorias em "$subs", que é uma matriz multidimensional contendo as informações
 de cada categoria. Para cada categoria, ele cria um item de lista "li" contendo 
 um link para a página da categoria correspondente. Em seguida, verifica se a 
 categoria atual tem subcategorias usando o "count" para contar o número de 
 elementos em "$sub ['subs']". Se houver subcategorias, ele chama novamente 
 o mesmo código ("menu_subcategory") passando as subcategorias e o nível 
 atual como parâmetros, permitindo a criação de categorias hierárquicas
  recursivas. O nível é incrementado em 1 a cada nível mais profundo da
   árvore de categorias para garantir a formatação correta do menu. -->