<h1>Carrinho de compras</h1>

<!-- <pre>
<?php print_r($list); ?>
</pre> -->

<table border="0" width="100%">
    <tr>
        <th width="120">Imagem</th>
        <th>Nome</th>
        <th width="70">Qtd.</th>
        <th width="150">Preço (un)</th>
        <th> Preço total</th>
    </tr>
    <?php 
        $subtotal = 0;
    ?>
    <?php foreach($list as $item): ?>
        <?php $subtotal += (floatval($item['price']) * intval($item['qt'])); ?>
        <tr>
            <td> <img src="<?php echo BASE_URL; ?>media/products/<?php echo $item['image'];?>" width="80" /> </td>
            <td> <?php echo $item['name'];?> </td>
            <td> <?php echo $item['qt']; ?> </td>
            <td> <?php echo number_format($item['price'], 2, ',','.'); ?></td>
            <td> <?php echo number_format($item['price'] * $item['qt'], 2); ?></td>
        </tr>
    <?php endforeach; ?>
        
    <tr>
        <td colspan="4" align="right">SubTotal: &nbsp; </td>
        <td> <strong> R$ <?php echo number_format($subtotal,2,',','.');?> <strong> </td>
    </tr>
</table>