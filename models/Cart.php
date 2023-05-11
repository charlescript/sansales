<?php

class Cart extends model
{

    public function getList()
    {
        $products = new Products();
        $array = array();

        if (isset($_SESSION['cart'])) { // Verifica se a sessão existe, caso contrário cria array vazio
            $cart = $_SESSION['cart'];
            foreach ($cart as $id => $qt) {

                $info = $products->getInfo($id);

                $array[] = array(
                    'id' => $id,
                    'qt' => $qt,
                    'price' => $info['vl_price'],
                    'name' => $info['nm_product'],
                    'image' => $info['image']
                );
            }
        }

        return $array;
    }

    public function getSubTotal()
    {
        $list = $this->getList();

        $subtotal = 0;

        foreach ($list as $item) {
            $subtotal += (floatval($item['price'] * intval($item['qt'])));
        }

        return $subtotal;
    }
}
