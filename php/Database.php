<?php


class Database
{

    /**
     * This function is used to establish a pdo connection and returns a pdo object
     * or if unsuccessful echoes the error message.
     * @return PDO - returns a successfull pdo connection object
     */
    public static function createConnection(){
        require "../config.php";
        try {
            return new PDO($dsn, $username, $password, $options);

        } catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    }




}