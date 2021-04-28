<?php

//somehow i made a working-ish cart system and i am proud of my self, although i did not find the time to implement validation due to procrastination on my side
class cart
{
    public static function initCart(){
        if(!isset($_SESSION['cart'])) $_SESSION['cart']= array(array());
    }

    public static function clearCart(){
        $_SESSION['cart']= array();
        header("location: cart.php");
    }
    public static function changeAmountCart($index,$newAmount){
        $cart = $_SESSION['cart'];
        foreach ($cart as $product){
            if($product['index'] == $index){
                $_SESSION['cart'][$index]['amount'] = $newAmount;
            }

        }

        header("location: cart.php");
    }

    public static function removeFromCart($index){
        unset($_SESSION['cart'][$index]);
    }


    public static function addToCart($prodId, $amount){
        if (isset($_REQUEST['id'], $_REQUEST['amount'])) {
            $arr= $_SESSION['cart'];
            array_push($arr, array("index" => count($arr), "productId" => intval($prodId), "amount" => intval($amount)));
            $_SESSION['cart'] =  $arr;
        }
        header("location: cart.php");
    }


}