<h1><?php echo $category_name; ?></h1>

<div class="row">
    <?php
    $a = 0; // Váriavel auxiliar de contagem para o foreach
    ?>

    <?php foreach ($list as $key => $product_item) : ?>
        <div class="col-sm-4">
            <?php $this->loadView('product_item', $product_item); ?>
        </div>
        <?php
        if ($a >= 2) {  // Quando o foreach bater em 3 eu fecho a div atual e abro uma nova
            $a = 0;
            echo '</div> <div class="row">';
        } else {
            $a++;  //incrementa a auxiliar para saber a volta
        }
        ?>
    <?php endforeach; ?>
</div> <!--  Esse fechamento é para a última div a ser fechada -->


<div class="paginationArea">
    <?php for ($q = 1; $q <= $numberOfPages; $q++) :  ?>
        <div class="paginationItem <?php echo ($currentPage == $q) ? 'pag_active' : ''; ?>"><a href="<?php echo BASE_URL; ?>categories/enter/<?php echo $id_category; ?> ?p=<?php echo $q; ?>"> <?php echo $q; ?> </a> </div>
    <?php endfor; ?>
</div>

<!-- <pre> -->
<!-- <?php print_r($category_filter); ?> -->

<!-- 
código é responsável por exibir uma lista de produtos de uma determinada categoria, com paginação e uma área de filtro para a categoria.

A primeira linha exibe o nome da categoria, que foi passado como parâmetro para a página.

Em seguida, o código utiliza um loop "foreach" para exibir cada produto na página, com o auxílio de outra view chamada "product_item". A cada 3 produtos, o código fecha a div atual e abre uma nova.

Depois, o código exibe a área de paginação, com um loop "for" que cria um link para cada página. O link redireciona para a mesma página atual, mas com um parâmetro de página diferente.

Por fim, há um comentário com a função "print_r", que é uma função para debug e exibe o conteúdo da variável $category_filter. -->