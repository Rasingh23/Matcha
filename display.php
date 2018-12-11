<?php session_start();

try{
    $con = new PDO("mysql:host=localhost", "root", "123456");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $con->query("USE matcha");
    $stmt = $con->prepare("SELECT * FROM `gallery` WHERE `userID` = :id");
    if (isset($_GET["user"]))
        $stmt->bindValue(':id', $_GET["user"]); 
    else
        $stmt->bindValue(':id', $_SESSION['id']);
    $stmt->execute();
    $test = $stmt->fetchAll();
    echo json_encode($test);
}  
catch (PDOException $e) {
    print "Error : ".$e->getMessage()."<br/>";
    die();
}
?>