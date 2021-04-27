<?php


class Account
{

    /**
     * This function is a rudimentary version of the final sign-up lacking validation
     * It takes all parameters neccesary for creating an account and inserts into the database
     * @param $accountUsername - used to set the username of the account
     * @param $accountPassword - used to set the password of the account
     * @param $accountEmail - used to set the email of the account
     * @param $firstName  -   used to set the first name of the account
     * @param $lastName - used to set the last name of the account
     */
    public static function register($accountUsername, $accountPassword, $accountEmail, $firstName, $lastName){
        include_once "Database.php";
        $link = Database::createConnection();
        $user = array($accountUsername,$accountPassword,$accountEmail,$firstName,$lastName);
        $id  = Database::createID("accountId", "account");


        $sql = "INSERT INTO account (accountId ,accountUsername, accountPassword, accountEmail, firstName, lastName)
            VALUES  ($id ,'$accountUsername', '$accountPassword', '$accountEmail', '$firstName', '$lastName');";
        $statement = $link->prepare($sql)->execute($user);
        header("Location: login.php");

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

    public static function changeDetail($key, $table, $username, $value){
        include_once "Database.php";
        $link = Database::createConnection();

        $sql = $sql = "UPDATE $table set $key = '$value' where accountUsername = '$username'";

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
        var_dump($sql);
        try{
            $statement = $link->prepare($sql)->execute();
            header("Location: signup.php");
        }
        catch (PDOException $error){
            echo $sql . "<br>" . $error->getMessage();
        }
    }
}