<html>
<head>
    <?php session_start()?>
</head>
<body>
<?php include_once "Layout/header.php"?>
<main>
        <div class="pageSpacer"></div>
        <div class="pageContainer">
            <?PHP include "../php/Product.php";
            $arr = Product::getProductArray();
            foreach ($arr as $product) { ?>
                <a class="productBox" href="product.php?id=<?PHP echo $product['productId']?>" style="background-image:url('<?PHP echo $product['productImgPath'] ?>' )">
                    <div class="productBoxTitle">
                        <?PHP echo $product['productName']; ?>
                        Price -
                        <?PHP echo $product['productPrice']; ?>
                        €
                    </div>
                </a>
            <?PHP } ?>
        </div>
        <div class="pageSpacer"></div>
</main>
<?php include_once "Layout/footer.php"?>
</body>
</html>