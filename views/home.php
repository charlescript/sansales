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
        <div class="paginationItem <?php echo ($currentPage == $q) ? 'pag_active' : ''; ?>"><a href="<?php echo BASE_URL; ?>?p=<?php echo $q; ?>"> <?php echo $q; ?> </a> </div>
    <?php endfor; ?>
</div>


<!-- faz uso de um loop foreach para exibir uma lista de produtos em uma 
página web, com três produtos por linha. Ele percorre um array $list de produtos 
e carrega a view product_item para cada um deles, em seguida, o código verifica 
se o contador auxiliar $a é maior ou igual a 2, o que significa que já foram 
exibidos três produtos na linha atual. Se esse for o caso, o código fecha a <div>
atual e abre uma nova <div> para os próximos produtos serem exibidos em uma 
nova linha. Caso contrário, ele incrementa o contador $a para manter o 
controle do número de produtos na linha atual. Por fim, há um fechamento 
de <div> para garantir que todas as linhas sejam fechadas corretamente. 
-->