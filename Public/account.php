<html>
<head>
    <?php session_start();
    include_once "../php/Account.php";
    $accDetails = Account::getAccountDetails(Account::getIDFromUsername($_SESSION['username']));
    ?>

</head>
<body>
<div>
    <h1>Change account details</h1>
    <?php
    include_once "../php/LayoutUtil.php";
    LayoutUtil::createAccountDetailForm("account.php", $accDetails['accountUsername'],"accountUsername","Username: ");
    LayoutUtil::createAccountDetailForm("account.php", $accDetails['firstName'],"firstName","First Name: ");
    LayoutUtil::createAccountDetailForm("account.php", $accDetails['lastName'],"lastName","Last Name: ");
    LayoutUtil::createAccountDetailForm("account.php", $accDetails['accountEmail'], "accountEmail","Email: ");
    LayoutUtil::createAccountDetailForm("account.php", $accDetails['accountPassword'], "accountPassword","Password: ");

    ?>
    <form action="account.php">
        <label>This will pernamently Delete your account WARNING</label>
        <input type="submit" name="delete" value="Delete Account">
    </form>


</div>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 Account::changeDetail($_REQUEST['secret'], 'account', $_SESSION['username'], $_REQUEST[$_REQUEST['secret']]);
 if(isset($_REQUEST['accountUsername'])){
     $_SESSION['username'] = $_REQUEST['accountUsername'];
 }

}


?>



</body>
</html>