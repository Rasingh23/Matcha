<?php session_start()   ;

    var_dump($_POST);
    $file = basename($_FILES["userpic"]["name"]);
    $path = "img/gallery/".$_SESSION['id'].'_'.$file;
    copy($_FILES["userpic"]["tmp_name"], $path);

    try{
        $con = new PDO("mysql:host=localhost", "root", "123456");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $con->query("USE matcha");
		$stmt = $con->prepare("SELECT * FROM `gallery` WHERE `userID` = :id");
        $stmt->bindValue(':id', $_SESSION['id']);
        $stmt->execute();
        if ($stmt->rowCount() < 4)
        {
            $con->query("USE matcha");
            $stmt = $con->prepare("INSERT INTO `gallery` (`userID`, `img`) VALUES (:user, :img)");
            $stmt->bindValue(':img', $path);
            $stmt->bindValue(':user', $_SESSION['id']);
            $stmt->execute();
            $con=null; 
        }
        else
        {
            echo 'nah';
        }
    }  
	catch (PDOException $e) {
		print "Error : ".$e->getMessage()."<br/>";
		die();
    }
 
?>