<?php
session_start();
$exp = explode('Matcha/', $_POST['src']);
$src = $exp[1];
echo ($src);
 try{
    $con = new PDO("mysql:host=localhost", "root", "123456");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $con->query("USE matcha");
    $stmt = $con->prepare("DELETE FROM `gallery` WHERE `img` = :img AND `user_ID` = :id");
    $stmt->bindValue(':img', $src);
    $stmt->bindValue(':id', $_SESSION['id']);
    $stmt->execute();
    $con = null;
}
catch (PDOException $e) {
    print "Error : ".$e->getMessage()."<br/>";
    die();
}
echo "<meta http-equiv='refresh' content='0,url=home.php'>";
?>