<?php


class Product
{
    public static function getProductArray(){
        try {
            include_once "Database.php";
            $link = Database::createConnection();

            $sql = "select * from game";

            $benny = $link->prepare($sql);
            $benny->execute();
            return $benny->fetchAll(PDO::FETCH_ASSOC);
        }
        catch (PDOException $error){
            echo $sql . "<br>" . $error->getMessage();
        }

    }

}