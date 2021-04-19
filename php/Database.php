<?php


class Database
{

    private static function createConnection(){
        require "../config.php";
         return new PDO("mysql:host=$host", $username, $password, $options);
    }


}