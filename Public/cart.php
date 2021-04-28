<html>
<head>
    <style>@import "css/stylesheet.css"; </style>
    <?php session_start()?>
</head>
<body>
<?php include_once "Layout/header.php";
include_once "../php/Cart.php";
cart::initCart();
cart::sumCartTotal();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    cart::updateCart();


}
?>
<main class="store">
<div class="pageSpacer"></div>
<div class="cartPageContainer">

    <?PHP include "../php/Product.php";
    $arr = $_SESSION['cart'];

    foreach ($arr as $producto) {$product = Product::getProduct($producto['productId']);?>
            <div class="cartBoxTitle">
                <div class="cartItemInfo"><img src="<?PHP echo $product['productImgPath'] ?>">
                <?PHP echo $product['productName']; ?>
                    Price: <?PHP echo $product['productPrice']; ?>€</div>
                <div class="cartItemForm">
                <label for="amount">Quantity</label>
                <form action="cart.php" method="post">
                    <input type="number" name="amount" value="<?php echo $producto['amount']?>">
                    <input type="hidden" name="index" value="<?php echo $producto['index']?>">
                    <input type="submit" name="changeAmount" value="Change Amount">
                    <input type="submit" name="remove" value="Reomve From Cart">
                </form>
                </div>
            </div>
    <?PHP }?>


    <form method="post" action="cart.php">
        Total: €<?php echo  $_SESSION['total']?>
        <input type="submit" value="clear cart" name="clear">
    </form>

</div>
<div class="pageSpacer"></div>

</main>
<?php include_once "Layout/footer.php"?>
</body>
</html>