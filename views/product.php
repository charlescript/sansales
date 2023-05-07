<div class="row">
    <div class="col-sm-5">
        Foto
    </div>
    <div class="col-sm-7">
        <h2> <?php echo $product_info['nm_product']; ?> </h2>
        Marca: &nbsp; <small> <?php echo $product_info['brand_name']; ?> </small>
        <hr>
        Classificação: &nbsp;
        
            <?php if ($product_info['qt_rating'] != 0) : ?>
                <?php for ($q = 0; $q < intval($product_info['qt_rating']); $q++) : ?>
                    <img style="margin-bottom: 1%;" src="<?php echo BASE_URL; ?>assets/images/star.png" border="0" height="15" />
                <?php endfor; ?>
            <?php endif; ?>
            <br>
            <b><?php echo $q; ?> estrelas </b> 
        <hr />
        <p> <?php echo $product_info['ds_product']; ?> </p>
    </div>
</div>