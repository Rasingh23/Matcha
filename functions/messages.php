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
            $stmt = $con->prepare("SELECT `User`,`userID` FROM `users` JOIN `likes` ON `liker_id`=`userID` WHERE `likee_id` = :user AND `liker_stat` = 1 AND `likee_stat` = 1");
            $stmt->bindParam(':user', $_SESSION['id']);
            $stmt->execute();
            $info = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $con->query("USE matcha");
            $stmt = $con->prepare("SELECT `User`,`userID` FROM `users` JOIN `likes` ON `likee_id`=`userID` WHERE `liker_id` = :user AND liker_stat = 1 AND `likee_stat` = 1");
            $stmt->bindParam(':user', $_SESSION['id']);
            $stmt->execute();
            $ret = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $fin = array_merge($ret, $info);
            foreach ($fin as $key => $value) {
                echo '<p onclick="showPart(this);" id='.$value["User"].' data-pid='.$value["userID"].' class="uname">'.$value["User"].'</p><br>';
            } 
            $con = null;
        } catch (PDOException $e) {
            print "Error : " . $e->getMessage() . "<br/>";
            die();
        }
        break;
        case 'sendMessage':
        $newmsg = $_REQUEST['chat'].$_SESSION['username'] .': '. $_REQUEST['message'];
        $newmsg = explode('<br>', $newmsg);
        $new = json_encode($newmsg);
        var_dump($new); 
        $con = new PDO("mysql:host=localhost", "root", "123456");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $con->query("USE matcha");
        $stmt = $con->prepare("UPDATE `likes` SET `chat` = :chat WHERE `liker_id`= :id AND `likee_id`= :usid OR `likee_id`= :id AND `liker_id`= :usid");
        $stmt->bindParam(':id', $_SESSION['id']);
        $stmt->bindParam(':usid', $_REQUEST['user']);
        $stmt->bindValue(':chat', $new);
        $stmt->execute();
        $con = null;
         echo 1; 
        break;
    case 'getMessages':

    $con = new PDO("mysql:host=localhost", "root", "123456");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $con->query("USE matcha");
    $stmt = $con->prepare("SELECT * FROM `likes` WHERE `liker_id`= :id AND `likee_id`= :usid OR `likee_id`= :id AND `liker_id`= :usid");
    $stmt->bindParam(':id', $_SESSION['id']);
    $stmt->bindParam(':usid', $_REQUEST['user']);
    $stmt->execute();
    $info = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $chat = '';
        echo json_encode($info[0]);
       // var_dump($info);
        /* foreach ($info as $key) {
            $chat .= '<div class="single-message">
            <strong>' . $key->user . ': </strong><br /> <p>' . $key->message . '</p>
            <br/>
            <span>' . date('h:i a', strtotime($key->date)) . '</span>
            </div>
            <div class="clear"></div>
            ';
        } */
      //  echo $chat;
        break; 
}
