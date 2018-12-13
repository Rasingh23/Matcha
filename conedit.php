<?php session_start();
try{
    $con = new PDO("mysql:host=localhost", "root", "123456");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $con->query("USE matcha");
    $stmt = $con->prepare("SELECT * FROM `users` WHERE `User`=:user");
    $stmt->bindParam(':user', $user);
    $stmt->execute();
    $info = $stmt->fetch(PDO::FETCH_ASSOC);
}
catch (PDOException $e) 
{
    print "Error : ".$e->getMessage()."<br/>";
    die();
}
if (isset($_POST['user']))
{
    if (strlen($_POST['newname']) <= 3 || strlen($_POST['newname']) >= 25)
    {
        echo "<meta http-equiv='refresh' content='0,url=edit.php'>";
        echo '<script>alert("User name must be between 3 and 25 characters")</script>';
        exit();
    }
    try
    {
        $con = new PDO("mysql:host=localhost", "root", "123456");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $con->query("USE matcha");
        $pass = password_hash($pass, PASSWORD_BCRYPT);
        $stmt = $con->prepare("UPDATE `users` SET `User`=:user WHERE `UserID` = :id");
        $stmt->bindValue(':id', $_SESSION['id']);
        $stmt->bindValue(':user', $_POST['newname']);
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
}
else if (isset($_POST['pass']))
{
    if (!(preg_match('/[A-Z]/', $_POST['newpass'])))
 {
    echo "<meta http-equiv='refresh' content='0,url=edit.php'>";
     echo '<script>alert("Password must contain at least one capital letter")</script>';
     exit();
 }
    if (strlen($_POST['newpass']) < 6)
    {
       
        echo "<meta http-equiv='refresh' content='0,url=edit.php'>";
         echo '<script type="text/javascript">alert("Password must be at least 6 characters")</script>';
         exit();
    }   
    if (strcmp($_POST['newpass'],$_post['conpass']))
    {
        echo "<meta http-equiv='refresh' content='0,url=edit.php'>";
        echo '<script>alert("Passwords do not match")</script>';
        exit();
    }
    if(!(password_verify($_POST['newpass'], $info['Pass'])))
    {
        echo "<meta http-equiv='refresh' content='0,url=edit.php'>";
        echo '<script>alert("Incorrect Password")</script>';
        exit();
    }
    try
    {
        $con = new PDO("mysql:host=localhost", "root", "123456");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $con->query("USE matcha");
        $pass = password_hash($pass, PASSWORD_BCRYPT);
        $stmt = $con->prepare("UPDATE `users` SET `Pass`=:pass WHERE `UserID` = :id");
        $stmt->bindValue(':id', $_SESSION['id']);
        $stmt->bindValue(':pass', $_POST['newpass']);
        $stmt->execute();
        $con=null;
        echo "<meta http-equiv='refresh' content='0,url=edit.php'>";        
        echo '<script>alert("Your password has been changed successfully")</script>';
    }
    catch (PDOException $e) 
    {
        print "Error : ".$e->getMessage()."<br/>";
        die();
    }
}
else if (isset($_POST['email']))
{
    if (!(filter_var($_POST['newmail'], FILTER_VALIDATE_EMAIL)))
 {
     echo "<meta http-equiv='refresh' content='0,url=edit.php'>";
     echo '<script>alert("Please enter a valid email address")</script>';
     exit();
 }
    try
    {
        $con = new PDO("mysql:host=localhost", "root", "123456");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $con->query("USE matcha");
        $pass = password_hash($pass, PASSWORD_BCRYPT);
        $stmt = $con->prepare("UPDATE `users` SET `E-mail`=:email WHERE `UserID` = :id");
        $stmt->bindValue(':id', $_SESSION['id']);
        $stmt->bindValue(':email', $_POST['newmail']);
        $stmt->execute();
        $con=null;
        echo "<meta http-equiv='refresh' content='0,url=edit.php'>";        
        echo '<script>alert("Your E-mail address has been changed successfully")</script>';
    }
    catch (PDOException $e) 
    {
        print "Error : ".$e->getMessage()."<br/>";
        die();
    }
}

else if (isset($_POST['newfirstname']))
{

    try
    {
        $con = new PDO("mysql:host=localhost", "root", "123456");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $con->query("USE matcha");
        $pass = password_hash($pass, PASSWORD_BCRYPT);
        $stmt = $con->prepare("UPDATE `users` SET `first`=:firstname WHERE `UserID` = :id");
        $stmt->bindValue(':id', $_SESSION['id']);
        $stmt->bindValue(':email', $_POST['newfirstname']);
        $stmt->execute();
        $con=null;
        echo "<meta http-equiv='refresh' content='0,url=edit.php'>";        
        echo '<script>alert("Your name has been changed successfully")</script>';
    }
    catch (PDOException $e) 
    {
        print "Error : ".$e->getMessage()."<br/>";
        die();
    }
}

else if (isset($_POST['newsurname']))
{

    try
    {
        $con = new PDO("mysql:host=localhost", "root", "123456");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $con->query("USE matcha");
        $pass = password_hash($pass, PASSWORD_BCRYPT);
        $stmt = $con->prepare("UPDATE `users` SET `surname`=:surname WHERE `UserID` = :id");
        $stmt->bindValue(':id', $_SESSION['id']);
        $stmt->bindValue(':email', $_POST['newsurname']);
        $stmt->execute();
        $con=null;
        echo "<meta http-equiv='refresh' content='0,url=edit.php'>";        
        echo '<script>alert("Your surname has been changed successfully")</script>';
    }
    catch (PDOException $e) 
    {
        print "Error : ".$e->getMessage()."<br/>";
        die();
    }
}
    ?>