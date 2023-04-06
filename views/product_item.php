

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


<!-- gera um bloco de HTML para exibir um produto na página da web. 
Ele faz uso de várias variáveis ​​PHP para renderizar as informações do produto. 
O bloco de HTML exibe a imagem principal do produto, seu nome, marca e preço. 
Ele também tem uma seção de tags que pode mostrar um rótulo indicando se o
 produto está em promoção, se é um best-seller ou se é um produto novo. 
 As tags são condicionais, então apenas aquelas que são relevantes para o produto
  específico serão exibidas. Há também um código PHP que verifica se existe um 
  preço anterior em promoção e exibe esse preço antes do preço atual, caso haja. 
  O código HTML inclui um link para a página do produto, que é configurado pela 
  variável $href. -->