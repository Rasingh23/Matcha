<?php

session_start();

try{
    $con = new PDO("mysql:host=localhost", "root", "123456");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $con->query("USE matcha");
    $stmt = $con->prepare("UPDATE `users` SET `notify` = '{}' WHERE `userID` = :img");
    $stmt->bindValue(':img', $_SESSION['id']);
    $stmt->execute();
    echo "fukk you bitch";
    $con = null;
}
catch (PDOException $e) {
    print "Error : ".$e->getMessage()."<br/>";
    die();
}
?>