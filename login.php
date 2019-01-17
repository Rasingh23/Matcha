<?php

    session_start();
    //require_once('config/database.php');
    
    $user = $_REQUEST['usn'];
    $pwd = $_REQUEST['pwd'];
try{

    $con = new PDO("mysql:host=localhost", "root", "123456");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $con->query("USE matcha");
    $stmt = $con->prepare("SELECT * FROM `users` WHERE `User`=:user");
    $stmt->bindParam(':user', $user);
    $stmt->execute();
    $info = $stmt->fetch(PDO::FETCH_ASSOC);
    if (in_array($user, $info))
    {
        if ($info["Active"] == 0)
        { 
            echo 0;
            exit();
            echo "<script type='text/javascript'>alert('Please activate your account');</script>";
             echo "<meta http-equiv='refresh' content='0,url=index.php'>";
            exit();
        }
        if(password_verify($pwd, $info['Pass']))
        {
            $_SESSION['auth'] = 1;
            $_SESSION['loggedin'] = 1;
            $_SESSION['id'] = $info['userID'];
            $_SESSION['username'] = $info['User'];
            $stmt = $con->prepare("UPDATE `users` SET `online` = '1' WHERE `User`=:user");
            $stmt->bindParam(':user', $user);
            $stmt->execute();
            $con->query("USE matcha");
            $stmt = $con->prepare("UPDATE users SET info = JSON_SET(info, '$.location', :lo ) WHERE `User` = :user");
            $stmt->bindValue(':user', $_SESSION['username']);
            $stmt->bindValue(':lo', $_REQUEST['locate']);
            $stmt->execute();
            $con=null;
            echo ("1");
            exit();
        }
        else
        { 
            echo 2;
            exit();
            echo "<script type='text/javascript'>alert('Incorrect Password');</script>";
             echo "<meta http-equiv='refresh' content='0,url=index.php'>";
            exit();
        }
    }
    else{
        echo 3;
        exit();
            echo "<script type='text/javascript'>alert('User does not exist.');</script>";
             echo "<meta http-equiv='refresh' content='0,url=index.php'>";
            exit();
    }

}
catch (PDOException $e) {

    print "Error : ".$e->getMessage()."<br/>";
    die();
}
 echo "<meta http-equiv='refresh' content='0,url=home.php'>";

?>