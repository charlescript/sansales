

<div class="product_item">
    <a href="">
        <div class="product_tags">
            <?php if($ic_sale == '1'): ?>
                <div class="product_tag product_tag_red"><b><?php $this->lang->get('SALE');?></b></div>
            <?php endif; ?>

            <?php if($ic_bestseller == '1'): ?>
                <div class="product_tag product_tag_green"><b><?php $this->lang->get('BESTSELLER');?></b></div>
            <?php endif; ?>

            <?php if($ic_new_product == '1'): ?>
                <div class="product_tag product_tag_blue"><b><?php $this->lang->get('NEW');?></b></div>
            <?php endif; ?>

        </div>
        <div class="product_image">
            <?php if(isset($images) && !empty($images)): ?>
				<img src="<?php echo BASE_URL;?>media/products/<?php echo $images[0]['ds_url']; ?>" width="100%" />
			<?php endif; ?>
        </div>
        <div class="product_name"><?php echo $nm_product; ?> </div>
        <div class="product_brand"> <?php echo $brand_name; ?> </div>
        <div class="product_price_from"> <?php 
            if($vl_price_from != '0'){  // Verifiquei se existiu preço antigo em promoção
                echo "R$".number_format($vl_price_from,2); // Apresenta numero formatado.
            } 
        ?> </div>

        <div class="product_price">R$ <?php echo number_format($vl_price,2); ?> </div>
        
        <div style="clear:both"></div>
    </a>
</div>