$(function () {

    $("#slider-range").slider({
        range: true,
        min: 0,
        max: maxslider,
        values: [ $('#slider0').val(), $('#slider1').val() ],
        slide: function (event, ui) {
            $("#amount").val("R$: " + ui.values[0] + "  até  R$: " + ui.values[1]);
        },
        change: function (event, ui) {
            $('#slider'+ui.handleIndex).val(ui.value);
            $('.filterarea form').submit();
        }
    });
    
    $("#amount").val("R$" + $("#slider-range").slider("values", 0) + 
        " - R$ " + $("#slider-range").slider("values", 1));

    // Abaixo o script que aplica submit no formulário da lateral esquerda 
    // no filterarea automaticamente, sempre que alguma checkbox for marcada ou modificada.
    $('.filterarea').find('input').on('change', function() {
        $('.filterarea form').submit();
    });


    $('.addtocartform button').on('click', function(e){   // Função para não atualizar a tela ao clicar no botão + / - do product.php
        e.preventDefault();

        var qt = parseInt($('.addtocart_qt').val());  // Captura o valor da quantidade no input text em product.php
        var action = $(this).attr('data-action');

        if(action == 'decrease'){
            if((qt-1) >= 1){  // Verifica se a quantidade de produtos está negativa, para não deixar ficar menor que 1
                qt = qt - 1;
            }
        }
        else if(action == 'increase'){
            qt += 1;  // Adiciona 1 na quantidade de produto no product.php
        }

        $('.addtocart_qt').val(qt);  // Atualiza a quantidade de produtos sem resetar na página product.php
    });
    

    $('.photo_item').on('click', function() {  // Função para trocar a imagem pequena do produto e coloca-la como principal em view/product.php
        var url = $(this).find('img').attr('src');
        $('.mainphoto').find('img').attr('src', url);
    });

});