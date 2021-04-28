<html>
<head>
    <style>@import "css/stylesheet.css"; </style>
    <?php session_start()?>
</head>
<body>
<?php include_once "Layout/header.php";
    include "../php/Product.php";
    $product = Product::getProduct($_REQUEST['id']);
    ?>
<main>
    <div class="pageSpacer"></div>
    <div class="pageContainer">
        <div class="productBoxTitle">
            <h1><?PHP echo $product['productName']; ?></h1><br>
            Price Per Product: <?PHP echo $product['productPrice']; ?> €
        </div>
        <form action="cart.php" method="post">
            <input type="number" name="amount" value="1">
            <input type="hidden" name="id" value="<?php echo $product['productId']?>">
            <input type="hidden" name="price" value="<?php echo $product['productPrice']?>">
            <input type="submit" name="addCart" value="Add to Cart">
        </form>
    </div>
    <div class="pageSpacer"></div>
</main>
<?php include_once "Layout/footer.php"?>
</body>
</html>