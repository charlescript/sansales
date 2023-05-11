<h1 id="items">Carrinho de compras</h1>

<!-- <pre>
<?php print_r($list); ?>
</pre> -->

<table border="0" width="100%" class="itens_cart">
    <tr>
        <th width="120">Imagem</th>
        <th width="120">Nome</th>
        <th width="70">Qtd.</th>
        <th width="20">Adicionar</th>
        <th width="20">Excluir</th>
        <th width="100">Preço (un)</th>
        <th width="100">SubTotal Produto</th>
    </tr>
    <?php 
        $subtotal = 0;
        $qtItens = 0;
    ?>
    <?php foreach($list as $item): ?>
        <?php $subtotal += (floatval($item['price']) * intval($item['qt'])); ?>
        <tr>
            <td> <img src="<?php echo BASE_URL; ?>media/products/<?php echo $item['image'];?>" width="80" /> </td>
            <td> <?php echo $item['name'];?> </td>
            <td> <?php echo $item['qt']; ?> </td>
            <td> <a href="<?php BASE_URL;?>cart/addProductCart/<?php echo $item['id']; ?>/<?php echo $item['qt'];?>"> <img src="<?php echo BASE_URL; ?>assets/images/add.png" width="20"/> </a> </td>
            <td> <a href="<?php BASE_URL;?>cart/del/<?php echo $item['id']; ?>/<?php echo $item['qt'];?>"> <img src="<?php echo BASE_URL; ?>assets/images/delete.png" width="20"/> </a> </td>
            <td> <?php echo number_format($item['price'], 2, ',','.'); ?></td>
            <td> <?php echo number_format(floatval(($item['price']) * intval($item['qt'])),2,',','.'); ?></td>
        </tr>
        <?php $qtItens += $item['qt'];?>
    <?php endforeach; ?>

    <tr>
        <td class ="subtotal" colspan="6" align="right">SubTotal carrinho: ( <?php echo $qtItens; ?> itens ): &nbsp; </td>
        <td class="vl_subtotal"> <strong> R$ <?php echo number_format($subtotal,2,',','.');?> <strong> </td>
    </tr>

</table>