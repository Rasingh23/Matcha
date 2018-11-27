<?php
session_start();
echo "NEWTOKEN:".$token = $_GET["token"];
echo "<br><br> NEW EMAIL:".$email = $_GET["email"];
    try{
        $con = new PDO("mysql:host=localhost", "root", "123456");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $con->query("Use matcha");
        $stmt = $con->prepare("SELECT `userID` FROM `users` WHERE `E-mail` = :email AND `Active`=0 AND `token`=:token");
        $stmt->bindValue(':token', $token);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        if ($stmt->rowCount() > 0)
        {
           
            $con->query("Use matcha");
            $stmt = $con->prepare("UPDATE `users` SET `Active`=1, `token`='' WHERE `E-mail` = :email");
            $stmt->bindValue(':email', $email);
            $stmt->execute();
            $con=null;
        }
    }
    catch (PDOException $e) {
        print "Error : ".$e->getMessage()."<br/>";
        die();
    }
    echo "<meta http-equiv='refresh' content='0,url=userdetails.php'>";
    echo '<script>alert("Your account has been activated successfully")</script>';
?>