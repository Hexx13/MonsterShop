<html>
<head>
    <?php session_start(); ?>
</head>
<body>
<div>
    <h1>Change account details</h1>
    <form action="account.php" method="post">
        <label for="username">Username</label>
        <input type="text"  placeholder="Username: " name="username">
        <input type="submit" value="change" name="submit">
        <br>
    </form>

    <form action="account.php" method="post">
        <label for="firstName">First Name</label>
        <input type="text"  placeholder="First name:" name="firstName">
        <input type="submit" value="change" name="submit">
        <br>
    </form>

    <form action="account.php" method="post">
        <label for="lastName">Last Name</label>
        <input type="text" placeholder="Last name:" name="lastName">
        <input type="submit" value="change" name="submit">
        <br>
    </form>

    <form action="account.php" method="post">
        <label for="email">Email </label>
        <input type="text" placeholder="Email:" name="email">
        <input type="submit" value="change" name="submit">
        <br>
    </form>

    <form action="account.php" method="post">
        <label for="password">password</label>
        <input type="password" placeholder="Password:" name="password">
        <input type="submit" value="change" name="submit">
        <br>
    </form>
</div>






</body>
</html>