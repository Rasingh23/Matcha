<?php
session_start();
/* require_once 'core/init.php';

$db = DB::getInstance();*/
switch ($_REQUEST['action']) {
    case 'getUsers':
        try {
            $con = new PDO("mysql:host=localhost", "root", "123456");
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $con->query("USE matcha");
            $stmt = $con->prepare("SELECT `User` FROM `users` JOIN `likes` ON `liker_id`=`userID` WHERE `likee_id` = :user");
            $stmt->bindParam(':user', $_SESSION['id']);
            $stmt->execute();
            $info = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $con->query("USE matcha");
            $stmt = $con->prepare("SELECT `User` FROM `users` JOIN `likes` ON `likee_id`=`userID` WHERE `liker_id` = :user");
            $stmt->bindParam(':user', $_SESSION['id']);
            $stmt->execute();
            $ret = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $fin = array_merge($ret, $info);
            foreach ($fin as $key => $value) {
                echo '<p onclick="showPart(this);" id='.$value["User"].' data-pid="changethisshit" class="uname">'.$value["User"].'</p><br>';
            } 
            $con = null;
        } catch (PDOException $e) {
            print "Error : " . $e->getMessage() . "<br/>";
            die();
        }
        break;
   /*  case 'sendMessage':
        if ($db->insert('messages', array('user' => 'Tyler', 'message' => escape($_REQUEST['message'])))) {
            echo 1;
            exit;
        }
        break;
    case 'getMessages':
        $db->query('SELECT * FROM messages');
        $res = $db->results();
        $chat = '';
        foreach ($res as $key) {
            $chat .= '<div class="single-message">
            <strong>' . $key->user . ': </strong><br /> <p>' . $key->message . '</p>
            <br/>
            <span>' . date('h:i a', strtotime($key->date)) . '</span>
            </div>
            <div class="clear"></div>
            ';
        }
        echo $chat;
        break; */
}
