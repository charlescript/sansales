<?php

class Filters extends model {

    public function getFilters(){
        $products = new Products();
        $brands = new Brands();

        $array = array(
            'brands' => array(),
            'maxslider' => 1000,
            'stars' => array(),
            'sale' => false,
            'options' => array()
        );

        $array['brands'] = $brands->getList();
        $brand_products = $products->getListOfBrands();

        foreach($array['brands'] as $bkey => $bitem){

            $array['brands'][$bkey]['count'] = '0';

            foreach($brand_products as $bproduct) {

                if($bproduct['id_brand'] == $bitem['id_brand']){

                    $array['brands'][$bkey]['count'] = $bproduct['c'];

                }
            }
        }

        return $array;
    }

}