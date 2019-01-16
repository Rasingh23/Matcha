<?php

    session_start();
    //require_once('config/database.php');
    
    $user = $_POST['usn'];
    $pwd = $_POST['pwd'];
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
            $con = null;
        }
        else
        { 
            echo "<script type='text/javascript'>alert('Incorrect Password');</script>";
             echo "<meta http-equiv='refresh' content='0,url=index.php'>";
            exit();
        }
    }
    else{
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