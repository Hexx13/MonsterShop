<html>
<head>
    <style>@import "css/stylesheet.css"; </style>
    <?php
    include_once "../php/Account.php";
    Account::pageSessionInit();
    ?>

</head>
<body>
<div>
    <?php include_once "Layout/header.php";?>
    <h1>Change account details</h1>
    <?php
    include_once "../php/LayoutUtil.php";

    /* TODO
     *  need to replace the code below with validated forms.. so much for the util class..
     * */
    $accDetails = Account::getAccountDetails(Account::getIDFromUsername($_SESSION['username']));
    LayoutUtil::createAccountDetailForm("account.php", $accDetails['accountUsername'],"accountUsername","Username: ");
    LayoutUtil::createAccountDetailForm("account.php", $accDetails['firstName'],"firstName","First Name: ");
    LayoutUtil::createAccountDetailForm("account.php", $accDetails['lastName'],"lastName","Last Name: ");
    LayoutUtil::createAccountDetailForm("account.php", $accDetails['accountEmail'], "accountEmail","Email: ");
    LayoutUtil::createAccountDetailForm("account.php", $accDetails['accountPassword'], "accountPassword","Password: ");

    ?>
    <form action="account.php" method="post">
        <label>WARNING This will pernamently Delete your account WARNING</label>
        <input type="submit" name="delete" value="Delete Account">
        <input type="hidden" name="secret" value="deleteAcc">
    </form>
    <a href="logout.php">Log Out</a>
</div>
<?php include_once "Layout/footer.php"?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_REQUEST['secret']=="deleteAcc"){
        Account::deleteAccount($_SESSION['id']);
    } else{
        Account::changeDetail($_REQUEST['secret'], 'account', $_SESSION['username'], $_REQUEST[$_REQUEST['secret']]);
        if(isset($_REQUEST['accountUsername'])){
            $_SESSION['username'] = $_REQUEST['accountUsername'];
        }
    }
}
?>



</body>
</html>