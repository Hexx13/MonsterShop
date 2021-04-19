<?php


require "config.php";

try {
    $connection = new PDO("mysql:host=$host", $username, $password, $options);
    $query = file_get_contents("data/init.sql");
    $connection->exec($query);
    echo "Init Successful";
} catch(PDOException $error) {
    echo $query . "Oh no oh god oh lord help whats wrong: " . $error->getMessage();
}