<?php


class Account
{
    public static function register($username,$password,$email,$firstName,$lastName){
    include_once "Database.php";
    $link = Database::createConnection();

    $sql = "INSERT INTO account VALUES ($id, $password, $username, $email, $firstName, $lastName);";
    }

}