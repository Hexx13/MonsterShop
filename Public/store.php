<html>
<head>
    <style>@import "css/stylesheet.css"; </style>
    <?php session_start()?>
</head>
<body>
<?php include_once "Layout/header.php"?>
<main class="store">
        <div class="pageSpacer"></div>
        <div class="storePageContainer">
            <?PHP include "../php/Product.php";
            $arr = Product::getProductArray();
            foreach ($arr as $product) { ?>
                <a class="productBox" href="productPage.php?id=<?PHP echo $product['productId']?>">
                    <img src="<?PHP echo $product['productImgPath'] ?>">
                    <div class="productBoxTitle">

                        <?PHP echo $product['productName']; ?>
                        <br>
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