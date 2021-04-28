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
            <a class="productBox" href="product.php?id=<?PHP echo $product['productId']?>" style="background-image:url('<?PHP echo $product['productImgPath'] ?>' )">
                <div class="productBoxTitle">
                    <?PHP echo $product['productName']; ?>
                    <?PHP echo $product['productPrice']; ?>
                    €
                </div>
            </a>
    </div>
    <div class="pageSpacer"></div>
</main>
<?php include_once "Layout/footer.php"?>
</body>
</html>