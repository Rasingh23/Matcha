<?php session_start();
if (!empty($_POST)) {
    try {
        $con = new PDO("mysql:host=localhost", "root", "123456");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $con->query("USE matcha");
        $stmt = $con->prepare("SELECT `img` FROM `gallery` JOIN `users` ON `userID` = `user_ID` WHERE `User` = :id");
        $stmt->bindValue(':id', $_POST["user"]);
        $stmt->execute();
        $test = $stmt->fetchAll();
        echo json_encode($test);
    } catch (PDOException $e) {
        print "Error : " . $e->getMessage() . "<br/>";
        die();
    }
} else {
    try {
        $con = new PDO("mysql:host=localhost", "root", "123456");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $con->query("USE matcha");
        $stmt = $con->prepare("SELECT * FROM `gallery` WHERE `user_ID` = :id");
        $stmt->bindValue(':id', $_SESSION['id']);
        $stmt->execute();
        $test = $stmt->fetchAll();
        echo json_encode($test);
    } catch (PDOException $e) {
        print "Error : " . $e->getMessage() . "<br/>";
        die();
    }
}
