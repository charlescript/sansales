

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
                echo "De<br/>R$ ".number_format($vl_price_from,2); // Apresenta numero formatado.
            } 
        ?> </div>

        <div class="product_price">Por<br/>R$  <?php echo number_format($vl_price,2); ?> </div>
        
        <div style="clear:both"></div>
    </a>
</div>

<!--  
Ele começa com uma div (uma caixa de conteúdo) com a classe "product_item". Dentro dessa div, há um link para o produto que está sendo exibido.

Em seguida, há outra div com a classe "product_tags" que exibe uma ou mais tags de produtos, dependendo de suas características. Por exemplo, se o produto está em promoção, uma tag "SALE" será exibida em vermelho. Se for um produto muito vendido, uma tag "BESTSELLER" será exibida em verde. Se for um produto novo, uma tag "NEW" será exibida em azul.

Depois, há outra div com a classe "product_image" que exibe uma imagem do produto, se houver alguma. Se houver mais de uma imagem, apenas a primeira será exibida.

A próxima div mostra o nome do produto e outra div mostra a marca. Em seguida, há uma div que exibe o preço do produto, primeiro o preço antigo (se houver) e depois o preço atual. Se houver um preço antigo, ele será exibido como "De R$ x.xx", caso contrário, apenas o preço atual será exibido como "Por R$ x.xx".

Por fim, há uma div com estilo "clear:both" que garante que a div da lista de produtos não sobreponha o conteúdo que vem depois.
 -->
