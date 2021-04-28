<?php


class cart
{
    public static function changeAmountCart($productId,$newAmount){
        $cart = $_SESSION['cart'];
        foreach ($cart as $product){
            if($product['productId'] == $productId){
                $product['amount'] = $newAmount;
            }
        }
        $_SESSION['cart'] = $cart;
    }

    public static function removeFromCart($index){
        unset($_SESSION['cart'][$index]);
    }


    public static function addToCart($prodId, $amount){
        if (isset($_REQUEST['id'], $_REQUEST['amount'])) {
            $arr= array();
            $arr += array("productId" => $prodId, "amount" => $amount, "index" => count($arr));
            $_SESSION['cart'] =  $arr;
        }
    }


}