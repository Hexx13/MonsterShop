<head>
    <?php session_start();session_destroy(); ?>
    <style>@import "css/stylesheet.css"; </style>
</head>
<body>

<form action="signup.php" method="POST">
    <label for="username">Username</label>
    <input type="text"  placeholder="Username: " name="username"><br>

    <label for="firstName">First Name</label>
    <input type="text"  placeholder="First name:" name="firstName"><br>

    <label for="lastName">Last Name</label>
    <input type="text" placeholder="Last name:" name="lastName"><br>


    <label for="email">Email </label>
    <input type="text" placeholder="Email:" name="email"><br>

    <label for="password">password</label>
    <input type="password" placeholder="Password:" name="password"><br>

    <input type="submit" value="Sign-Up"><br>
    <label> Have account?</label>
    <a href="login.php">SIGN UP HERE</a>
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once "../php/Account.php";
    Account::register($_REQUEST['username'],$_REQUEST['password'],$_REQUEST['email'],$_REQUEST['firstName'],$_REQUEST['lastName']);

}
?>

</body>
