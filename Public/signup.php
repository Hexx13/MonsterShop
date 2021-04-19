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
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username =  $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $emailAddress = $_REQUEST['email'];
    $firstName = $_REQUEST['firstName'];
    $lastName = $_REQUEST['lastName'];

}
?>

</body>
