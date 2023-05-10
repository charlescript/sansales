<?php

class Cart extends model {

    public function getList() {
        $products = new Products();

        $array = array();
        $cart = $_SESSION['cart'];

        foreach($cart as $id => $qt) {
            
            $info = $products->getInfo($id);

            $array[] = array(
                'id' => $id,
                'qt' => $qt,
                'price' => $info['vl_price'],
                'name' => $info['nm_product'],
                'image' => $info['image']    
            );
        }

        return $array;
    }

}