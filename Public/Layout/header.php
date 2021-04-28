<header>
    <script src="https://kit.fontawesome.com/5d386f1f25.js" crossorigin="anonymous"></script>
    <?php if($_SESSION["login"] != true){header("location: login.php");}?>
    <div class="rightHead">
        <a href="index.php">Home</a>
        <a href="store.php">Store</a>
        <a href="about.php">About</a>
    </div>
    <div class="headSpacer"></div>
    <div class="leftHead">
        <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
        <a href="account.php"><i class="fas fa-user"></i></a>
    </div>
</header>