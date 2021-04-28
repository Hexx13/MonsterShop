<?php

//somehow i made a working-ish cart system and i am proud of my self, although i did not find the time to implement validation due to procrastination on my side
class cart
{
    public static function initCart(){
        if(!isset($_SESSION['cart'])) $_SESSION['cart']= array(array());

    }
    public static function clearCart(){
        $_SESSION['cart']= array();
    }
    public static function changeAmountCart($index,$newAmount){
        $cart = $_SESSION['cart'];
        foreach ($cart as $product){
            if($product['index'] == $index){
                $_SESSION['cart'][$index]['amount'] = $newAmount;
            }

        }
    }
    public static function removeFromCart($index){
        unset($_SESSION['cart'][$index]);
    }
    public static function addToCart($prodId, $amount, $price){
        if (isset($_REQUEST['id'], $_REQUEST['amount'])) {
            $arr= $_SESSION['cart'];
            array_push($arr, array("index" => count($arr), "productId" => intval($prodId), "amount" => intval($amount), "price" => intval($price)));
            $_SESSION['cart'] =  $arr;
        }

    }
    public static function updateCart(){
        if(isset($_REQUEST['clear'])){
            cart::clearCart();
        } if(isset($_REQUEST['changeAmount'])){

            cart::changeAmountCart($_REQUEST['index'],$_REQUEST['amount']);
        }if(isset($_REQUEST['remove'])){
            cart::removeFromCart($_REQUEST['index']);
        }else {
            cart::addToCart($_REQUEST['id'], $_REQUEST['amount'], $_REQUEST['price']);
        }
        header("location: cart.php");
    }
    public static function sumCartTotal(){
        $_SESSION['total'] = 0;
        foreach ($_SESSION['cart'] as $productino){
            for ($i = 0; $i < $productino['amount']; $i++){
                $cash = intval($productino['price']);
                $_SESSION['total'] += $cash;
            }
        }
    }


}