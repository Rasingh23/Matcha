<?php
/* session_start();
 */$DB_DSN = "mysql:host=localhost";
$DB_USER = "root";
$DB_PASSWORD = "123456";

try {
    $con = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    // set the PDO error mode to exception
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>