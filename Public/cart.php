<html>
<head>
    <style>@import "css/stylesheet.css"; </style>
    <?php include_once "../php/Account.php";
    Account::pageSessionInit();?>
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
    if(isset($_SESSION['cart'][0])){

        $arr = $_SESSION['cart'];
        foreach ($arr as $producto) {
            $product = Product::getProduct($producto['productId']);
            echo '<div class="cartBoxTitle">';
                echo '<div class="cartItemInfo">
                        <img src="'; echo $product['productImgPath']; echo '">';?>
                        <?PHP echo $product['productName']; ?>
                        <?PHP echo 'Price:';  echo $product['productPrice']; echo '€
                    </div>';
                    echo '<div class="cartItemForm">';
                        echo '<label for="amount">Quantity</label>';
                        echo '<form action="cart.php" method="post">';
                            echo '<input type="number" name="amount" value="'; echo $producto['amount']; echo '">';
                            echo '<input type="hidden" name="index" value="'; echo $producto['index']; echo'">';
                            echo '<input type="submit" name="changeAmount" value="Change Amount">';
                            echo '<input type="submit" name="remove" value="Reomve From Cart">';
                    echo'</form>';
                echo '</div>';
           echo '</div>';?>
        <?PHP }
    }else echo "cart is empty";?>




    <form method="post" action="cart.php">
        Total: €<?php echo  $_SESSION['total']?>
        <input type="submit" value="clear cart" name="clear">
        <input type="submit" value="continue to purchase" name="purchase">
    </form>

</div>
<div class="pageSpacer"></div>

</main>
<?php include_once "Layout/footer.php"?>
</body>
</html>