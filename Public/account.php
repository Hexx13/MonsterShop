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
    LayoutUtil::createAccountDetailForm("account.php", $accDetails['accountUsername'],"username","Username: ");
    LayoutUtil::createAccountDetailForm("account.php", $accDetails['firstName'],"firstName","First Name: ");
    LayoutUtil::createAccountDetailForm("account.php", $accDetails['lastName'],"lastName","Last Name: ");
    LayoutUtil::createAccountDetailForm("account.php", $accDetails['accountEmail'], "email","Email: ");
    LayoutUtil::createAccountDetailForm("account.php", $accDetails['accountPassword'], "password","Password: ");

    ?>


</div>


<?php
if($_REQUEST)


?>



</body>
</html>