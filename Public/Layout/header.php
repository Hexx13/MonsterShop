<header>
    <?php if($_SESSION["login"] != true){header("location: login.php");}?>
    <div class="rightHead">
        <a href="index.php">Home</a>
        <a href="store.php">Store</a>
        <a href="about.php">About</a>
    </div>
    <div class="headSpacer"></div>
    <div class="leftHead">
        <a href="cart.php">shopicon</a>
        <a href="account.php">accounticon</a>
    </div>
</header>