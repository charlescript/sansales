<div class="row">
    <div class="col-sm-5">
        <div class="mainphoto">
            <img src="<?php echo BASE_URL; ?>media/products/<?php echo $product_images[0]['ds_url']; ?>" />
        </div>
        <div class="gallery">
            <?php foreach ($product_images as $img) : ?>
                <div class="photo_item product-img">
                    <img src=" <?php echo BASE_URL; ?>media/products/<?php echo $img['ds_url']; ?>" />
                </div>
            <?php endforeach; ?>
        </div>
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
        <hr>
        De: <span class="price_from">R$ <?php echo number_format($product_info['vl_price_from'], 2); ?> </span> <br>
        Por: <span class="original_price">R$ <?php echo number_format($product_info['vl_price'], 2); ?> </span>

        <form method="POST" class="addtocartform" action="<?php echo BASE_URL; ?>cart/add">
            <input type="hidden" name="id_product" value="<?php echo $product_info['id_product'];?>" />
            <input type="hidden" name="qt_product" value="1" />
            <button data-action="decrease">-</button><input type="text" name="qt" value="1" class="addtocart_qt" disabled /><button data-action="increase">+</button>
            <input class="addtocart_submit" type="submit" value="<?php $this->lang->get('ADD_TO_CART'); ?>" />
        </form>
    </div>
</div>

<hr>

<div class="row">

    <div class="col-sm-6">
        <h3> <?php $this->lang->get('PRODUCT_SPECIFICATIONS'); ?> </h3>
        <?php foreach ($product_options as $po) : ?>
            <strong> <?php echo $po['nm_option']; ?> </strong> : <?php echo $po['value']; ?> <br />
        <?php endforeach; ?>
    </div>

    <div class="col-sm-6">
        <h3> <?php $this->lang->get('PRODUCT_REVIEWS'); ?> </h3>
        <?php foreach ($product_rates as $rate) : ?>
            <strong> <?php echo $rate['user_name']; ?> </strong> -
            <?php for ($q = 0; $q < intval($rate['qt_point']); $q++) : ?>
                <img style="margin-bottom: 1%;" src="<?php echo BASE_URL; ?>assets/images/star.png" border="0" height="15" />
            <?php endfor; ?>
             <br>
            " <?php echo $rate['ds_comment']; ?>"
            <hr>
        <?php endforeach; ?>
    </div>

</div>