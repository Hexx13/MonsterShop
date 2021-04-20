<?php


class Account
{

    public static function register($accountUsername, $accountPassword, $accountEmail, $firstName, $lastName){
        include_once "Database.php";
        $link = Database::createConnection();
        $user = array($accountUsername,$accountPassword,$accountEmail,$firstName,$lastName);

        $sql = sprintf("INSERT INTO account (accountUsername, accountPassword, accountEmail, firstName, lastName)
            VALUES ( '$accountUsername', '$accountPassword', '$accountEmail', '$firstName', '$lastName');");
        $statement = $link->prepare($sql);
        $statement->execute($user);
    }

    public static function createID($pk, $table){
        include_once "Database.php";
        $link = Database::createConnection();

        $sql = "SELECT $pk FROM $table ORDER BY $pk DESC LIMIT 1";
        $statement = $link->query($sql);

    }

}