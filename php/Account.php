<?php


class Account
{

    public static function register($accountUsername, $accountPassword, $accountEmail, $firstName, $lastName){
        include_once "Database.php";
        $link = Database::createConnection();
        $user = array($accountUsername,$accountPassword,$accountEmail,$firstName,$lastName);


        $id  = Account::createID("accountId", "account");

        $sql = sprintf("INSERT INTO account (accountId ,accountUsername, accountPassword, accountEmail, firstName, lastName)
            VALUES  ($id ,'$accountUsername', '$accountPassword', '$accountEmail', '$firstName', '$lastName');");
        $statement = $link->prepare($sql);
        $statement->execute($user);
    }

    public static function createID($pk, $table){
        include_once "Database.php";
        $link = Database::createConnection();

        $sql = "SELECT $pk FROM $table ORDER BY $pk DESC LIMIT 1";
        $id = $link->query($sql)->fetch();
        return $id+1;
    }

}