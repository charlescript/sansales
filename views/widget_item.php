<?php foreach($list as $widget_item) : ?>

<div class="widget_item">
    <a href="<?php echo BASE_URL; ?>product/open/<?php echo $widget_item['id_product'];?> ">
        <div class="widget_info">
            <div class="widget_productname"><?php echo $widget_item['nm_product']; ?></div>
            <div class="widget_price"><span><?php echo number_format($widget_item['vl_price_from'],2, ',', '.'); ?></span> &nbsp;<sub> por apenas </sub>&nbsp; <?php echo number_format($widget_item['vl_price'], 2, ',', '.'); ?> </div>
        </div>

        <div class="widget_photo">
            <img src="<?php echo BASE_URL;?>media/products/<?php echo $widget_item['images'][0]['ds_url']; ?>" />
        </div>

        <div style="clear:both;"></div>
    </a>
</div>

<?php endforeach; ?>

