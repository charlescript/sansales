<?php
class Filters extends model {

    public function getFilters($filters){
        $products = new Products();
        $brands = new Brands();

        $array = array(
            'searchTerm' => '',
            'brands' => array(),
            'slider0' => 0,
            'slider1' => 0,
            'maxslider' => 1000,
            'stars' => array(
                '0' => 0,
                '1' => 0,
                '2' => 0,
                '3' => 0,
                '4' => 0,
                '5' => 0
            ),
            'sale' => false,
            'options' => array()
        );

        if(isset($filters['searchTerm'])) {
            $array['searchTerm'] = $filters['searchTerm'];
        }

        $array['brands'] = $brands->getList();
        $brand_products = $products->getListOfBrands($filters);

        // Criando filtro de Marcas
        foreach($array['brands'] as $bkey => $bitem){

            $array['brands'][$bkey]['count'] = '0';

            foreach($brand_products as $bproduct) {
                if($bproduct['id_brand'] == $bitem['id_brand']){
                    $array['brands'][$bkey]['count'] = $bproduct['c'];
                }
            }

            if( $array['brands'][$bkey]['count'] == '0') {
                unset($array['brands'][$bkey]);
            }
        }

        // Criando filtro de Preço, estabelecendo o preço máximo disponivel de produto
        if(isset($filters['slider0'])){
            $array['slider0'] = $filters['slider0'];
        }
        if(isset($filters['slider1'])){
            $array['slider1'] = $filters['slider1'];
        }
        $array['maxslider'] = $products->getMaxPrice($filters);
        if($array['slider1'] == 0) {
            $array['slider1'] = $array['maxslider'];
        }

        // Criando filtro das estrelas
        $star_products = $products->getListOfStars($filters);
        foreach($array['stars'] as $skey => $sitem) {
            foreach($star_products as $sproduct) {
                if($sproduct['qt_rating'] == $skey){
                    $array['stars'][$skey] = $sproduct['c'];
                }
            }
        }

        // Criando filtro de promoções
        $array['sale'] = $products->getSaleCount($filters);


        //criando filtro das opções
        $array['options'] = $products->getAvailableOptions($filters);

        return $array;
    } // Fim método get Filters

}