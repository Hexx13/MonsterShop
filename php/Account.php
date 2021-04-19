<?php


class Account
{
    public static function register($accountUsername, $accountPassword, $accountEmail, $firstName, $lastName){
    include_once "Database.php";
    $link = Database::createConnection();

    /*$sql = sprintf("INSERT INTO account (accountPassword, accountUsername, accountEmail, firstName, lastName)
            VALUES ( '$password', '$username', '$email', '$firstName', '$lastName');");*/


    $user = array($accountUsername,$accountPassword,$accountEmail,$firstName,$lastName);
    $sql = sprintf(
        "INSERT INTO %s (%s) values (%s)",
        "account",
        implode(", ", array_keys($user)),
        ":" . implode(", :", array_keys($user))
    );

        $statement = $link->prepare($sql);
        $statement->execute($user);
    }

}