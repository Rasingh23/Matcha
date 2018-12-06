<?php session_start()   ;


    $file = basename($_FILES["image"]["name"]);
    $path = "img/gallery/".$file;
    copy($_FILES["image"]["tmp_name"], $path);
    try{
        $con = new PDO("mysql:host=localhost", "root", "123456");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $con->query("USE matcha");
		$stmt = $con->prepare("SELECT `info` FROM `users` WHERE `userID` = :id");
        $stmt->bindValue(':id', $_SESSION['id']);
        $stmt->execute();
        $info = $stmt->fetch();
        $json = json_decode($info);
        echo $info;
    }  
	catch (PDOException $e) {
		print "Error : ".$e->getMessage()."<br/>";
		die();
    }
    
/* 
    try{
        $con = new PDO("mysql:host=localhost", "root", "123456");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $con->query("USE camagru");
		$stmt = $con->prepare("SELECT `info` FROM `users` WHERE `userID` = :id");
        $stmt->bindValue(':id', $_SESSION['id']);
        $stmt->bindValue(':img', $file);
        $stmt->execute();
        $con = null;
        echo "<script>alert('DONE!')</script>";
        $_POST['insert'] = null;
	}
	catch (PDOException $e) {
		print "Error : ".$e->getMessage()."<br/>";
		die();
	}*/
?>