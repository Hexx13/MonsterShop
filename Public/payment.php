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
    //TODO implement form handling for purchase and return to cart button
}
?>
<main class="store">
    <div class="pageSpacer"></div>
    <div class="cartPageContainer">


        <!-- TODO implement form for address and payment details -->

        <form method="post" action="purchase.php">
            <input type="text" name="fullname" placeholder="Full Name">
            <input type="tel" name="tel" placeholder="Phone Number">
            <input type="text" name="street" placeholder="Street Name">
            <input type="text" name="city" placeholder="City">
            <select name="county" placeholder="County">
                <!-- TODO implement counties -->
            </select>
            <input type="text" name="eircode" placeholder="Eircode">
            <select name="country" placeholder="Country">
                <!-- TODO implement counties -->
            </select>


            Total: €<?php echo  $_SESSION['total']?>
            <input type="submit" value="return to cart" name="cart">
            <input type="submit" value="purchase" name="purchase">
        </form>

    </div>
    <div class="pageSpacer"></div>

</main>
<?php include_once "Layout/footer.php"?>
</body>
</html>