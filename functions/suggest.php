<?php session_start();

try {
    if ($_SESSION['gender'] == 'male')
            $gender = "female";
        else
            $gender = "male";

    if ($_SESSION['pref'] == 'straight') {
        $con = new PDO("mysql:host=localhost", "root", "123456");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $con->query("USE matcha");
        $stmt = $con->prepare("SELECT * FROM `users` WHERE json_unquote(json_extract(`info`, '$.gender')) = :gender AND NOT json_unquote(json_extract(`info`, '$.pref')) = 'gay' AND NOT `userID` = :id");
        $stmt->bindParam(':id', $_SESSION['id']);
        $stmt->bindParam(':gender', $gender);
        $stmt->execute();
        $info = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($info);
        $con = null;
    } else if ($_SESSION['pref'] == "gay") {
        $con = new PDO("mysql:host=localhost", "root", "123456");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $con->query("USE matcha");
        $stmt = $con->prepare("SELECT * FROM `users`  WHERE json_unquote(json_extract(`info`, ‘$.gender’)) = :gender AND NOT json_unquote(json_extract(`info`, '$.pref')) = 'straight' AND NOT `userID` = :id");
        $stmt->bindParam(':id', $_SESSION['id']);
        $stmt->bindParam(':gender', $_SESSION['gender']);
        $stmt->bindParam(':pref', $_SESSION['pref']);
        $stmt->execute();
        $info = $stmt->fetchAll(PDO::FETCH_ASSOC);
        var_dump($info);
        $con = null;
    } else  if ($_SESSION['pref'] == 'bi') {
        $con = new PDO("mysql:host=localhost", "root", "123456");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $con->query("USE matcha");
        $stmt = $con->prepare("SELECT * FROM `users`  WHERE 
        json_unquote(json_extract(`info`, '$.pref')) = 'straight' AND  json_unquote(json_extract(`info`, ‘$.gender’)) = :opposite
        OR
         json_unquote(json_extract(`info`, '$.pref')) = 'gay' AND  json_unquote(json_extract(`info`, ‘$.gender’)) = :same
        OR
         json_unquote(json_extract(`info`, '$.pref')) = 'bi'
        AND NOT `userID` = :id");
        $stmt->bindParam(':id', $_SESSION['id']);
        $stmt->bindParam(':opposite', $gender);
        $stmt->bindParam(':same', $_SESSION['gender']);
        $stmt->execute();
        $info = $stmt->fetchAll(PDO::FETCH_ASSOC);
        var_dump($info);
        $con = null;
    } else 
    {
        $con = new PDO("mysql:host=localhost", "root", "123456");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $con->query("USE matcha");
        $stmt = $con->prepare("SELECT * FROM `users`  WHERE NOT `userID` = :id");
        $stmt->bindParam(':id', $_SESSION['id']);
        $stmt->execute();
        $info = $stmt->fetchAll(PDO::FETCH_ASSOC);
        var_dump($info);
        $con = null;
    } 
} catch (PDOException $e) {

    print "Error : " . $e->getMessage() . "<br/>";
    die();
}
