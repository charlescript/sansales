<h1>Você está procurando por:  "<?php echo $searchTerm; ?>" </h1>

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
</div> 
<div class="paginationArea">
    <?php for ($q = 1; $q <= $numberOfPages; $q++) :  ?>
        <div class="paginationItem <?php echo ($currentPage == $q) ? 'pag_active' : ''; ?>"><a href="<?php echo BASE_URL; ?>? <?php
            $pag_array = $_GET;
            $pag_array['p'] = $q;
            echo http_build_query($pag_array);
        ?> "> <?php echo $q; ?> </a> </div>
    <?php endfor; ?>
</div>