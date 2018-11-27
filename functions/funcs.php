<?php

if(isset($_POST['fetchnames'])){
    getNames();
}

function getNames(){

    $test = trim($_POST['fetchnames']);
    if ($test == "" OR empty($test) OR $test == NULL)
    {
        echo ("FUCK THUT");
  
    }
   // exit();
    $srchtxt = $_POST['fetchnames']."%";
    try{

        $con = new PDO("mysql:host=localhost", "root", "123456");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $con->query("USE matcha");
        $stmt = $con->prepare("SELECT * FROM `users` WHERE User LIKE :srch");
        $stmt->bindParam(':srch', $srchtxt);
        $stmt->execute();
        $info = $stmt->fetchAll(PDO::FETCH_ASSOC);
       echo json_encode($info);
    }
    catch (PDOException $e) {
    
        print "Error : ".$e->getMessage()."<br/>";
        die();
    }
}




?>