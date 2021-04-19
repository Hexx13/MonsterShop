<?php


class Database
{

    public static function createConnection(){
        require "../config.php";
        try {
            return new PDO($dsn, $username, $password, $options);

        } catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    }


}