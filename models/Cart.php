<?php
class Cart extends model {

    public function getList(){
        $products = new Products();

        $array = array();
        $cart = array();

        if (isset($_SESSION['cart'])) { // Verifica se a sessão existe, caso contrário cria array vazio
            $cart = $_SESSION['cart'];
        }

        foreach ($cart as $id => $qt) {

            $info = $products->getInfo($id);

            $array[] = array(
                'id' => $id,
                'qt' => $qt,
                'price' => $info['vl_price'],
                'name' => $info['nm_product'],
                'image' => $info['image'],
                'weight' => $info['vl_weight'],
                'width' => $info['vl_width'],
                'height' => $info['vl_height'],
                'length' => $info['vl_length'],
                'diameter' => $info['vl_diameter']
            );
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

    
    public function shippingCalculate($cepDestination){   //Calcula frete

        $array = array(
            'price' => 0,
            'date' => '',
        );

        global $config;

        $list = $this->getList();

        $nVlPeso = 0;
        $nVlComprimento = 0;
        $nVlAltura = 0;
        $nVlLargura = 0;
        $nVlDiametro = 0;
        $nVlValorDeclarado = 0;

        foreach($list as $item){  // Populando as variaveis com os valores provindos do banco
            $nVlPeso += floatval($item['weight']);
            $nVlComprimento += floatval($item['length']);
            $nVlAltura += floatval($item['height']);
            $nVlLargura += floatval($item['width']);
            $nVlDiametro += floatval($item['diameter']);
            $nVlValorDeclarado += floatval($item['price'] * $item['qt']);
        }

        $soma = $nVlComprimento + $nVlAltura + $nVlLargura;
        if($soma > 200) {
            $nVlComprimento = 66;
            $nVlAltura = 66;
            $nVlLargura = 66;
        }

        if($nVlDiametro > 90) {
            $nVlDiametro = 90;
        }

        if($nVlPeso > 40){
            $nVlPeso = 40;
        }


        $data = array(  // Requisitos da API do correio
            'nCdServico' => '40010',
            'sCepOrigem' => $config['cep_origin'],
            'sCepDestino' => $cepDestination,
            'nVlPeso' => $nVlPeso,
            'nCdFormato' => '1',
            'nVlComprimento' => $nVlComprimento,
            'nVlAltura' => $nVlAltura,
            'nVlLargura' => $nVlLargura,
            'nVlDiametro' => $nVlDiametro,
            'sCdMaoPropria' => 'N',
            'nVlValorDeclarado' => $nVlValorDeclarado,
            'sCdAvisoRecebimento' => 'N',
            'StrRetorno' => 'xml'
        );

        $url = 'http://ws.correios.com.br/calculador/CalcPrecoprazo.aspx';
        $data = http_build_query($data);

        $ch = curl_init($url.'?'.$data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $r = curl_exec($ch);
        $r = simplexml_load_string($r);

        $array['price'] = current($r->cServico->Valor);
        $array['date'] = current($r->cServico->PrazoEntrega);

        return $array;
    }

} // Fim classe Cart
