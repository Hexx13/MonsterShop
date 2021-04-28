<head>
    <style>@import "css/stylesheet.css"; </style>
    <?php session_start(); ?>
</head>
<body>

<form action="login.php" method="POST">
    <label for="username">Username</label>
    <input type="text"  placeholder="Username: " name="username"><br>

    <label for="password">password</label>
    <input type="password" placeholder="Password:" name="password"><br>

    <input type="submit" value="Sign-In"><br>
    <label> Dont have account?</label>
    <a href="signup.php">LOG IN HERE</a>
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_REQUEST['password'];
    $username= $_REQUEST['username'];
    include_once "../php/Account.php";
    Account::login(Account::attemptLogin($username,$password),$username);

}
?>

</body>
