<html>
<head>
    <?php session_start()?>
</head>
<body>
<?php include_once "Layout/header.php";
include_once "../php/Cart.php";
cart::initCart();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_REQUEST['clear'])){
        cart::clearCart();
    }else {
        cart::addToCart($_REQUEST['id'], $_REQUEST['amount']);
    }
}


var_dump($_SESSION['cart']);
?>

<form method="post">
    <input type="submit" value="clear cart" name="clear">
</form>

<?php include_once "Layout/footer.php"?>
</body>
</html>