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
    <?php foreach ($list as $item) : ?>
        <?php $subtotal += (floatval($item['price']) * intval($item['qt'])); ?>
        <tr>
            <td> <img src="<?php echo BASE_URL; ?>media/products/<?php echo $item['image']; ?>" width="80" /> </td>
            <td> <?php echo $item['name']; ?> </td>
            <td> <?php echo $item['qt']; ?> </td>
            <td> <a href="<?php BASE_URL; ?>cart/addProductCart/<?php echo $item['id']; ?>/<?php echo $item['qt']; ?>"> <img src="<?php echo BASE_URL; ?>assets/images/add.png" width="20" /> </a> </td>
            <td> <a href="<?php BASE_URL; ?>cart/del/<?php echo $item['id']; ?>/<?php echo $item['qt']; ?>"> <img src="<?php echo BASE_URL; ?>assets/images/delete.png" width="20" /> </a> </td>
            <td> <?php echo number_format($item['price'], 2, ',', '.'); ?></td>
            <td> <?php echo number_format(floatval(($item['price']) * intval($item['qt'])), 2, ',', '.'); ?></td>
        </tr>
        <?php $qtItens += $item['qt']; ?>
    <?php endforeach; ?>

    <tr>
        <td class="subtotal" colspan="6" align="right">SubTotal carrinho: ( <?php echo $qtItens; ?> itens ): &nbsp; </td>
        <td class="vl_subtotal"> <strong> R$ <?php echo number_format($subtotal, 2, ',', '.'); ?> <strong> </td>
    </tr>
    <hr>
    <tr>
        <td class="frete" colspan="6" align="right">Frete: </td>
        <td class="frete_itens">
            <?php if (isset($shipping['price'])) : ?>
                <strong>R$ <?php echo $shipping['price']; ?></strong> (<?php echo $shipping['date']; ?> dia<?php echo ($shipping['date']==1)?'':'s'; ?>)
            <?php else : ?>
                <form class="input_cep" method="POST" > <!-- Manda as informações de CEP para o controllers/cartController.php -->
                    <input type="number" name="cep"  placeholder="Qual seu CEP?" />
                    <input type="submit" value="Calcular" />
                </form>
            <?php endif; ?>
        </td>
    </tr>
    <hr>
    <tr>
        <td class="subtotal" colspan="6" align="right">Total Compra: </td>
        <td class="vl_subtotal"> <strong> R$ <?php 
        $frete = 0;
        if(isset($shipping['price'])) { // Verifica se existe sessão iniciada com preço ( serve somente no primeiro acesso para evitar ausência desse vetor pelo fato de na 1º vez estar vazio)
            $frete = floatval(str_replace(',','.',$shipping['price']));
        }
        $total = $subtotal + $frete;
        echo number_format($total, 2, ',', '.'); 
        ?> <strong> </td>
    </tr>
</table>

<hr />

<?php if($frete > 0) :?>

<form method="POST" action="<?php echo BASE_URL; ?>cart/payment_redirect" style="float:right">
    <select name="payment_type">
        <option value="checkout_transparent">Pagseguro Checkout Transparente</option>
    </select>

    <input type="submit" value="Finalizar Compra" class="button" />
</form>

<?php endif; ?>
