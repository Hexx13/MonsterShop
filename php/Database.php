<?php


class Database
{

    public static function createConnection(){
        require "../config.php";
         return new PDO("mysql:host=$host", $username, $password, $options);
    }


}