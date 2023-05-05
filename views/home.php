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
</div> <!--  Esse fechamento é para a última div a ser fechada -->
<!-- 
Esse código PHP gera um layout de grade de produtos, onde cada produto é exibido em uma coluna com 4 colunas por linha.
O código começa definindo uma variável auxiliar de contagem "$a" para o loop "foreach".
O código usa um loop "foreach" para percorrer a lista de produtos "$list" e exibir cada produto usando um modelo de visualização "product_item" usando a função "loadView".
O código verifica se a variável auxiliar "$a" é maior ou igual a 2, o que significa que o loop foreach exibiu 3 produtos e, portanto, precisa fechar a div atual e abrir uma nova div para a próxima linha de produtos. Se não, a variável auxiliar é incrementada em 1.
Finalmente, o código fecha a última div que foi aberta. -->
<!-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->


<!-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<div class="paginationArea">
    <?php for ($q = 1; $q <= $numberOfPages; $q++) :  ?>
        <div class="paginationItem <?php echo ($currentPage == $q) ? 'pag_active' : ''; ?>"><a href="<?php echo BASE_URL; ?>? <?php
            $pag_array = $_GET;
            $pag_array['p'] = $q;
            echo http_build_query($pag_array);
        ?> "> <?php echo $q; ?> </a> </div>
    <?php endfor; ?>
</div>
<!-- Este código PHP gera uma área de paginação para exibir uma lista de itens divididos em várias páginas. A área de paginação é exibida em uma div com a classe "paginationArea".
O código usa um loop "for" para criar uma div com a classe "paginationItem" para cada página. Cada div contém um link para a página correspondente usando a variável $q como o número da página.
O código também verifica se a página atual é a mesma que a página que está sendo gerada no loop usando a variável $currentPage. Se for o caso, adiciona a classe "pag_active" à div.
Finalmente, o código também usa a função http_build_query para gerar uma string de consulta com o parâmetro "p" que corresponde ao número da página. Essa string de consulta é adicionada ao link para permitir que o usuário navegue pelas diferentes páginas. A constante BASE_URL é usada como o URL base para os links. -->
<!-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->


