<?php
require_once 'core/init.php';

$db = DB::getInstance();
$user = new user;

switch (input::get('action')) {
    case 'sendMessage':
        $message  = json_decode(input::get('message'));
        $db->query('UPDATE likes SET chat = ? WHERE `liker_id`= ' . $user->data()->user_id . ' AND `likee_id` = ? OR `likee_id`= ' . $user->data()->user_id . ' AND `liker_id`= ?', array('chat' => $message, 'likee_id' => input::get('person'), 'liker_id' => input::get('person') ));
        echo 1;
        exit;
        break;
    case 'getMessages':
        $db->query('SELECT chat FROM likes  WHERE `liker_id`= ' . $user->data()->user_id . ' AND `likee_id` = ? OR `likee_id`= ' . $user->data()->user_id . ' AND `liker_id`= ?', array('likee_id' => input::get('user'), 'liker_id' => input::get('user') ));
        echo json_encode($db->results());
        break;

    default:
        # code...
        break;
}

