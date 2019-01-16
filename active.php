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
    echo '<script>alert("Your account has been activated successfully")</script>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="js/jquery-3.3.1.min.js"></script>
    <title>Document</title>
</head>
<body>
    <form action='userdetails.php' method='get' id="form">
    <input type='hidden' value=<?php $_GET["email"]?>>
    </form>

</body>
</html>
<script>
var parts = window.location.search.substr(1).split("&");
var $_GET = {};
for (var i = 0; i < parts.length; i++) {
    var temp = parts[i].split("=");
    $_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
}
const form = document.createElement('form');
form.action = 'userdetails.php';
form.method = 'get';

const homeInput = document.createElement('input');
homeInput.type = 'hidden';
homeInput.name = 'email';
homeInput.value = $_GET['email'];
form.appendChild(homeInput);
document.body.appendChild(form);
form.submit();
/* 
form = document.getElementById("form");
$(document).ready(function(){   
    alert($("form").serialize());
});
 */
/* form.submit(); */
</script>