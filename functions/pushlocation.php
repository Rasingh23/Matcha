<?php session_start();

try
    {
        $con = new PDO("mysql:host=localhost", "root", "123456");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $con->query("USE matcha");
        $pass = password_hash($pass, PASSWORD_BCRYPT);
        $stmt = $con->prepare("UPDATE users SET info = JSON_SET(info, '$.location', :lo ) WHERE `UserID` = :id");
        $stmt->bindValue(':id', $_SESSION['id']);
        $stmt->bindValue(':lo', $_REQUEST['locate']);
        $stmt->execute();
        $con=null;
        echo "<meta http-equiv='refresh' content='0,url=edit.php'>";        
        echo '<script>alert("Your username has been changed successfully")</script>';
    }
    catch (PDOException $e) 
    {
        print "Error : ".$e->getMessage()."<br/>";
        die();
    }
?>