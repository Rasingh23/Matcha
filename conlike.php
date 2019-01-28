<?php session_start();

require 'notify.php';
echo $_POST['uid'] . "<br>";
echo $_SESSION['id'] . "<br>";
echo $_POST['stat'];
if ($_POST['stat'] == 'Like') {
    try
    {
        $con = new PDO("mysql:host=localhost", "root", "123456");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $con->query("USE matcha");
        $stmt = $con->prepare("SELECT * FROM `likes` WHERE `likee_id` = :usid AND `liker_id` = :id ");
        $stmt->bindValue(':usid', $_POST['uid']);
        $stmt->bindValue(':id', $_SESSION['id']);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $con->query("USE matcha");
            $stmt = $con->prepare("INSERT INTO `likes` (`liker_id`, `likee_id`, `liker_stat`, `likee_stat`, `chat` ) VALUES (:id, :usid, 1, 0, '{}') ON DUPLICATE KEY UPDATE
        liker_stat = 1");
            $stmt->bindValue(':usid', $_POST['uid']);
            $stmt->bindValue(':id', $_SESSION['id']);
            $stmt->execute();
        } else {
            $con->query("USE matcha");
            $stmt = $con->prepare("INSERT INTO `likes` (`liker_id`, `likee_id`, `liker_stat`, `likee_stat`, `chat` ) VALUES (:id, :usid, 1, 0, '{}') ON DUPLICATE KEY UPDATE
        likee_stat = 1");
            $stmt->bindValue(':usid', $_POST['uid']);
            $stmt->bindValue(':id', $_SESSION['id']);
            $stmt->execute();
        }
        $token = "QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm";
        $token = str_shuffle($token);
        $token = substr($token, 0, 3);
        $note = $_SESSION['username']." liked your profile.";
        $con->query("USE matcha");
        $stmt = $con->prepare("UPDATE `users` SET `notify` = JSON_SET(notify, '$.{$token}', '{$note}' ) WHERE `userID` = {$_POST['uid']}");
        $stmt->execute();
        $con = null;

    } catch (PDOException $e) {
        print "Error : " . $e->getMessage() . "<br/>";
        die();
    }
} else if ($_POST['stat'] == 'Like back') {
    try
    {
        $con = new PDO("mysql:host=localhost", "root", "123456");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $con->query("USE matcha");
        $stmt = $con->prepare("SELECT * from `likes` WHERE `liker_id` = :id AND `likee_id` = :usid ");
        $stmt->bindValue(':usid', $_POST['uid']);
        $stmt->bindValue(':id', $_SESSION['id']);
        $stmt->execute();
        var_dump($stmt->fetch());
        if ($stmt->rowCount() > 0) {
            echo $_POST['liked'];
            $con->query("USE matcha");
            $stmt = $con->prepare("UPDATE `likes` SET `liker_stat`=:val WHERE `liker_id` = :id AND `likee_id` = :usid ");
            $stmt->bindValue(':val', $_POST['liked']);
            $stmt->bindValue(':usid', $_POST['uid']);
            $stmt->bindValue(':id', $_SESSION['id']);
            $stmt->execute();
        } else {
            $con->query("USE matcha");
            $stmt = $con->prepare("UPDATE `likes` SET `likee_stat`=:val WHERE `liker_id` = :id AND `likee_id` = :usid ");
            $stmt->bindValue(':val', $_POST['liked']);
            $stmt->bindValue(':usid', $_POST['uid']);
            $stmt->bindValue(':id', $_SESSION['id']);
            $stmt->execute();
        }
        $token = "QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm";
        $token = str_shuffle($token);
        $token = substr($token, 0, 3);
        $note = $_SESSION['username']." liked your profile back.";
        $con->query("USE matcha");
        $stmt = $con->prepare("UPDATE `users` SET `notify` = JSON_SET(notify, '$.{$token}', '{$note}' ) WHERE `userID` = {$_POST['uid']}");
        $stmt->execute();
        $con = null;
    } catch (PDOException $e) {
        print "Error : " . $e->getMessage() . "<br/>";
        die();
    }

} else if ($_POST['stat'] == 'unlike') {
    try
    {
        $con = new PDO("mysql:host=localhost", "root", "123456");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $con->query("USE matcha");
        $stmt = $con->prepare("SELECT * FROM `likes` WHERE `likee_id` = :usid AND `liker_id` = :id ");
        $stmt->bindValue(':usid', $_POST['uid']);
        $stmt->bindValue(':id', $_SESSION['id']);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $con->query("Use matcha");
            $stmt = $con->prepare("UPDATE `likes` SET `liker_stat`=0 WHERE `liker_id` = :id");
            $stmt->bindValue(':id', $_SESSION['id']);
            $stmt->execute();
        } else {
            $con->query("Use matcha");
            $stmt = $con->prepare("UPDATE `likes` SET `likee_stat`=0 WHERE `likee_id` = :id");
            $stmt->bindValue(':id', $_SESSION['id']);
            $stmt->execute();
        }
        $token = "QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm";
        $token = str_shuffle($token);
        $token = substr($token, 0, 3);
        $note = $_SESSION['username']." unliked your profile.";
        $con->query("USE matcha");
        $stmt = $con->prepare("UPDATE `users` SET `notify` = JSON_SET(notify, '$.{$token}', '{$note}' ) WHERE `userID` = {$_POST['uid']}");
        $stmt->execute();
        $con = null;
    } catch (PDOException $e) {
        print "Error : " . $e->getMessage() . "<br/>";
        die();
    }

}
