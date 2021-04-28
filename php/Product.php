<?php


class Product
{
    public static function getProductArray(){
        try {
            include_once "Database.php";
            $link = Database::createConnection();

            $sql = "select * from product";

            $benny = $link->prepare($sql);
            $benny->execute();
            return $benny->fetchAll(PDO::FETCH_ASSOC);
        }
        catch (PDOException $error){
            echo $sql . "<br>" . $error->getMessage();
        }
    }

    public static function getProduct($id){
        try {
            include_once "Database.php";
            $link = Database::createConnection();

            $sql = "select * from product where productId=$id";

            $benny = $link->prepare($sql);
            $benny->execute();
            return $benny->fetchAll(PDO::FETCH_ASSOC)[0];
        }
        catch (PDOException $error){
            echo $sql . "<br>" . $error->getMessage();
        }
    }

}