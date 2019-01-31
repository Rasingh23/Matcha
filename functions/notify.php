<?php

session_start();
switch ($_REQUEST['action']) {
    case 'clear':
        try {
            $con = new PDO("mysql:host=localhost", "root", "123456");
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $con->query("USE matcha");
            $stmt = $con->prepare("UPDATE `users` SET `notify` = '{}' WHERE `userID` = :img");
            $stmt->bindValue(':img', $_SESSION['id']);
            $stmt->execute();
            echo 0;
            $con = null;
        } catch (PDOException $e) {
            print "Error : " . $e->getMessage() . "<br/>";
            die();
        }
        break;
    case 'fetch':
        try {

            $con = new PDO("mysql:host=localhost", "root", "123456");
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $con->query("USE matcha");
            $stmt = $con->prepare("SELECT * FROM `users` WHERE `User`=:user");
            $stmt->bindParam(':user', $_SESSION['username']);
            $stmt->execute();
            $info = $stmt->fetch(PDO::FETCH_ASSOC);
            echo ($info['notify']);
            $count = count($notify);
            /*  echo $count; */
            $con = null;
        } catch (PDOException $e) {

            print "Error : " . $e->getMessage() . "<br/>";
            die();
        }
        break;
}
