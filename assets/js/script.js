$(function () {

    $("#slider-range").slider({
        range: true,
        min: 0,
        max: maxslider,
        values: slidervalues,
        slide: function (event, ui) {
            $("#amount").val("R$: " + ui.values[0] + "  até  R$: " + ui.values[1]);
        }
    });
    
    $("#amount").val("R$" + $("#slider-range").slider("values", 0) + 
        " - R$ " + $("#slider-range").slider("values", 1));

    // Abaixo o script que aplica submit no formulário da lateral esquerda 
    // no filterarea automaticamente, sempre que alguma checkbox for marcada ou modificada.
    $('.filterarea').find('input').on('change', function() {
        $('.filterarea form').submit();
    });

    

});