<head>
    <?php session_start();session_destroy(); ?>
    <style>@import "css/stylesheet.css"; </style>
</head>
<body>
    <!-- TODO
                * Elaborate on the username validation to validate alphanumeric and not allow symbols
                *add title tags explaining patterns
     -->
<form action="signup.php" method="POST">
    <label for="username">Username</label>
    <input type="text" id="username" required pattern="[a-z0-9._%+-]+[a-z0-9.-]+\.[a-z].{3,16}" placeholder="Username: " name="username"><br>

    <label for="firstName">First Name</label>
    <input type="text"  required pattern="[A-Za-z]{2,}" placeholder="First name:" name="firstName"><br>

    <label for="lastName">Last Name</label>
    <input type="text" required pattern="[A-Za-z]{2,}" placeholder="Last name:" name="lastName"><br>


    <label for="email">Email </label>
    <input type="text" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}" placeholder="Email:" name="email"><br>

    <label for="email">Confirm Email </label>
    <input type="text" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}" placeholder="Confirm Email:" name="emailConf"><br>

    <label for="password">password</label>
    <input type="password"  required pattern=".{3,}" placeholder="Password:" name="password"><br>

    <label for="password">Confirm password</label>
    <input type="password"  required pattern=".{3,}" placeholder="Confirm Password:" name="passwordConf"><br>

    <input type="submit" value="Sign-Up"><br>
    <label> Have account?</label>
    <a href="login.php">SIGN UP HERE</a>
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once "../php/Account.php";
    if(Account::validateSignUp($_REQUEST['password'], $_REQUEST['passwordConf'], $_REQUEST['email'], $_REQUEST['emailConf'])){
        Account::register($_REQUEST['username'],$_REQUEST['password'],$_REQUEST['email'],$_REQUEST['firstName'],$_REQUEST['lastName']);
    }
    else echo "The password confirmation or email confirmation do not match";

}
?>

</body>
