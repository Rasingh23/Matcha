<?php
session_start();
​
try {
    $token = "QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm";
          $token = str_shuffle($token);
          $token = substr($token, 0, 3);
          $user = $_POST['user'];
          $me = $_SESSION['username'];
          echo '|'. $_SESSION['username'] . '|';
      $con = new PDO("mysql:host=localhost", "root", "123456");
      $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $con->query("USE matcha");
      $stmt = $con->prepare("UPDATE `users` SET `blocklist` = JSON_SET(blocklist, '$.{$token}', '{$_SESSION['username']}' ) WHERE `User` = '{$_POST['user']}'");
      $stmt->execute();
      $stmt = $con->prepare("UPDATE `users` SET `blocklist` = JSON_SET(blocklist, '$.{$token}', '{$user}' ) WHERE `User` = '{$_SESSION['username']}'");
      $stmt->execute();
      $con = null;
  } catch (PDOException $e) {
  
      print "Error : " . $e->getMessage() . "<br/>";
      die();
  }
?>