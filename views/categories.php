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
        <div class="paginationItem <?php echo ($currentPage == $q) ? 'pag_active' : ''; ?>"><a href="<?php echo BASE_URL; ?>categories/enter/<?php echo $id_categories;?> ?p=<?php echo $q; ?>"> <?php echo $q; ?> </a> </div>
    <?php endfor; ?>
</div>
