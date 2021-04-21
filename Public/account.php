<html>
<head>
    <?php session_start(); ?>
</head>
<body>

<form action="account.php" method="post">
    <label for="username">Username</label>
    <input type="text"  placeholder="Username: " name="username"><br>


</form>

<form action="account.php" method="post">
    <label for="firstName">First Name</label>
    <input type="text"  placeholder="First name:" name="firstName"><br>


</form>

<form action="account.php" method="post">
    <label for="lastName">Last Name</label>
    <input type="text" placeholder="Last name:" name="lastName"><br>

</form>

<form action="account.php" method="post">
    <label for="email">Email </label>
    <input type="text" placeholder="Email:" name="email"><br>
</form>

<form action="account.php" method="post">
    <label for="password">password</label>
    <input type="password" placeholder="Password:" name="password"><br>
</form>







</body>
</html>