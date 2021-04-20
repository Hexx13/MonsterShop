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

    /**
     * This is a rudimentary version for generating the id in a table provided using a primary key provided
     * and returns the next available id in the table
     * @param $pk - takes the primary key name
     * @param $table - takes the table name
     * @return int|mixed - returns the next available id
     */
    public static function createID($pk, $table){
        include_once "Database.php";
        $link = self::createConnection();

        $sql = "SELECT $pk FROM $table ORDER BY $pk DESC LIMIT 1";
        $id = $link->query($sql)->fetch();
        return $id+1;
    }


}