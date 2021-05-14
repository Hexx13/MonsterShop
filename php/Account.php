<?php


class Account
{

    public static function register(){
        $username = strtolower($_REQUEST['username']);
        $email = strtolower($_REQUEST['email']);
        $emailConf = $_REQUEST['emailConf'];
        if(Account::validateDetail('accountUsername', $username)) {
            if(Account::validateDetail('accountEmail', $email)){
                if (Account::validateSignUp($_REQUEST['password'], $_REQUEST['passwordConf'], $email, $emailConf)) {
                    Account::insertAccount($_REQUEST['username'], $_REQUEST['password'], $_REQUEST['email'], $_REQUEST['firstName'], $_REQUEST['lastName']);
                    header("Location: login.php");
                } else echo "The password confirmation or email confirmation do not match";
            }
            else echo "The Email is already being used";
        } else echo  "The Username is already being used";




    }
    private static function insertAccount($accountUsername, $accountPassword, $accountEmail, $firstName, $lastName){
        include_once "Database.php";
        $link = Database::createConnection();
        $user = array($accountUsername,$accountPassword,$accountEmail,$firstName,$lastName);
        $id  = Database::createID("accountId", "account");


        $sql = "INSERT INTO account (accountId ,accountUsername, accountPassword, accountEmail, firstName, lastName)
            VALUES  ($id ,'$accountUsername', '$accountPassword', '$accountEmail', '$firstName', '$lastName');";
        $statement = $link->prepare($sql)->execute($user);
    }

    private static function validateSignUp($accountPassword, $passwordConf, $accountEmail, $emailConf){
        if(self::validateConfirm($accountPassword, $passwordConf)){
            if(self::validateConfirm($accountEmail, $emailConf)){
                return true;
            }
        }
        return false;
    }

    private static function validateConfirm($value, $confValue){
        return $value == $confValue;
    }

    //takes column and a value and references against present value returns true if it does not exist already
    public static function validateDetail($column, $value){
        include_once "Database.php";
        $link = Database::createConnection();
        $sql = "select $column from account";

        $benny = $link->prepare($sql);
        $benny->execute();
        $optionArr = $benny->fetchAll(PDO::FETCH_ASSOC);
        foreach ($optionArr as $array){
            if($value == $array[$column])return false;
        }
        return true;
    }

    public static function login($result, $username){
        if ($result) {
            $_SESSION["login"] = true;
            $_SESSION["username"] = $username;
            $_SESSION["id"]=self::getIDFromUsername($username);
            header("location:index.php");
        } else {
            echo "Yeah uh chief those details are wrong"; // need a error header
        }

    }

    public static function attemptLogin($username, $password){
        try {
            include_once "Database.php";
            $link = Database::createConnection();

            $sql = "select * from account where accountUsername='$username'and accountPassword='$password'";

            $benny = $link->prepare($sql);
            $benny->execute();
            return $benny->fetchAll(PDO::FETCH_ASSOC);
        }
        catch (PDOException $error){
            echo $sql . "<br>" . $error->getMessage();
        }
    }

    public static function changeDetail($column, $table, $username, $value){
        include_once "Database.php";
        $link = Database::createConnection();

        $sql = $sql = "UPDATE $table set $column = '$value' where accountUsername = '$username'";

        try{
            $statement = $link->prepare($sql)->execute();
            header("Location: account.php");

        }catch (PDOException $error){
            echo $sql . "<br>" . $error->getMessage();
        }
    }

    public static function getAccountDetails($accountId){
        try {
            include_once "Database.php";
            $link = Database::createConnection();

            $sql = "select * from account where accountId='$accountId'";

            $benny = $link->prepare($sql);
            $benny->execute();
            return $benny->fetchAll(PDO::FETCH_ASSOC)[0];
        }
        catch (PDOException $error){
            echo $sql . "<br>" . $error->getMessage();
        }
    }

    public static function getIDFromUsername($username){
        try {
            include_once "Database.php";
            $link = Database::createConnection();

            $sql = "select * from account where accountUsername='$username'";

            $benny = $link->prepare($sql);
            $benny->execute();
            $idArr = $benny->fetchAll(PDO::FETCH_ASSOC);
            return  $idArr[0]['accountId'];
        }
        catch (PDOException $error){
            echo $sql . "<br>" . $error->getMessage();
        }
    }

    public static function deleteAccount($id){
        include_once "Database.php";
        $link = Database::createConnection();

        $sql="DELETE FROM account WHERE accountId= $id;";
        try{
            $statement = $link->prepare($sql)->execute();
            header("Location: signup.php");
        }
        catch (PDOException $error){
            echo $sql . "<br>" . $error->getMessage();
        }
    }

    public static function verifySession(){
        session_start();
        return isset($_SESSION['login']);
    }

    public static function pageSessionInit(){
        $init = self::verifySession() ? null : header("location: login.php");
    }
}