<html>
<head>
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
    </div>
    <div class="pageSpacer"></div>
</main>
<?php include_once "Layout/footer.php"?>
</body>
</html>