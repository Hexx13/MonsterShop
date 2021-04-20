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
        $statement = $link->prepare($sql);
        $statement->execute($user);
    }




    public static function login($username, $password){


    }

    public static function attemptLogin($username, $password){
        try {
            include_once "Database.php";
            $link = Database::createConnection();

            $sql = "select * from account 
                    where accountUsername='$username'
                    and accountPassword='$password'";

            $stmt = $link->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch (PDOException $error){
            echo $sql . "<br>" . $error->getMessage();
        }
    }

}