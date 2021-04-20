<body>

<form action="login" method="POST">
    <label for="username">Username</label>
    <input type="text"  placeholder="Username: " name="username"><br>

    <label for="password">password</label>
    <input type="password" placeholder="Password:" name="password"><br>

    <input type="submit" value="Sign-Up"><br>
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once "../php/Account.php";
    Account::login($_REQUEST['username'],$_REQUEST['password']);
}
?>

</body>
