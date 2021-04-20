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


        $id  = Account::createID("accountId", "account");

        $sql = "INSERT INTO account (accountId ,accountUsername, accountPassword, accountEmail, firstName, lastName)
            VALUES  ($id ,'$accountUsername', '$accountPassword', '$accountEmail', '$firstName', '$lastName');";
        $statement = $link->prepare($sql);
        $statement->execute($user);
    }

    /**
     * This is a rudimentary version for generating the id in a table provided using a primary key provided
     * and returns the next available id in the table
     * @param $pk - takes the primary key name
     * @param $table - takes the table name
     * @return int|mixed - returns the next available id
     */
    public static function createID($pk, $table){
        include_once "Database.php";
        $link = Database::createConnection();

        $sql = "SELECT $pk FROM $table ORDER BY $pk DESC LIMIT 1";
        $id = $link->query($sql)->fetch();
        return $id+1;
    }


    public static function login($username, $password){


    }

    public static function attemptLogin($username, $password){
        include_once "Database.php";
        $link = Database::createConnection();

        $sql = "select * from account 
                    where account_username='$username'
                    and account_Password='$password'";
    }

}