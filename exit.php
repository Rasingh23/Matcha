<?php
session_start();
date_default_timezone_set('Africa/Johannesburg');
$con = new PDO("mysql:host=localhost", "root", "123456");
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$con->query("USE matcha");
$stmt = $con->prepare("UPDATE `users` SET `online` = :of WHERE `UserID`=:user");
$stmt->bindParam(':user', $_SESSION['id']);
$stmt->bindParam(':of', date("h:i:s"));
$stmt->execute();
$con = null;
session_destroy();
header('Location: index.php');
echo "<script>alert('You have successfully logged out.')</script>"
?>
