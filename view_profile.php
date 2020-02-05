<?php
require_once 'core/init.php';
$db = DB::getInstance();
$user = new user;
if (input::exists('request')) {
	if (input::get('profile'))
	{
		$user2 = new user(input::get('profile'));
		$views = json_decode($user2->data()->views);
		$pro = json_decode($user2->data()->profile);
		$pro->fame += 2;
		$user2->update(array('profile' => json_encode($pro)), $user2->data()->user_id);
		if ($views){
			if (!in_array($user->data()->username, $views)){
				$views[] = $user->data()->username;
				$user2->update(array('views' => json_encode($views)), $user2->data()->user_id);
			}
		}
		else{
			$views[] = $user->data()->username;
			$user2->update(array('views' => json_encode($views)), $user2->data()->user_id);
		}
		// $sqluser = $user->data()->user_id;
		$db->query("SELECT users.*, gallery.img_name, likes.* FROM `users` LEFT JOIN gallery ON gallery.user_id = users.user_id Left JOIN likes ON (likes.liker_id = users.user_id AND likes.likee_id = ? ) OR (likes.likee_id = users.user_id AND likes.liker_id = ? ) WHERE username =  ?", array( 'likes.likee_id'=> intval($user->data()->user_id), 'likes.liker_id'=> intval($user->data()->user_id), 'username' => input::get('profile')));
		$data = $db->results();
		echo json_encode($data);
	}
	else if (input::get('block')) {
		$user2 = new user(input::get('block'));
		$blockee = json_decode($user2->data()->blocked);
		$blockee->blocker[] = $user->data()->username;
		$user2->update(array('blocked' => json_encode($blockee)), $user2->data()->user_id);
		$blocker = json_decode($user->data()->blocked);
		$blocker->blockee[] = input::get('block');
		$user->update(array('blocked' => json_encode($blocker)));
		echo 1;

	}
	// else if (input::get('unblock')){
	// 	$user2 = new user(input::get('unblock'));
	// 	$blockee = json_decode($user2->data()->blocked);
	// 	unset($blockee->blocker[$user->data()->username]);
	// 	$user2->update(array('blocked' => json_encode($blockee)), $user2->data()->user_id);
	// 	$blocker = json_decode($user->data()->blocked);
	// 	unset($blocker->blockee[input::get('unblock')]);
	// 	$user->update(array('blocked' => json_encode($blocker)));
	// 	echo 1;
	// }
	else if (input::get('blockstat')){
		$user2 = new user(input::get('blockstat'));
		$blockee = json_decode($user2->data()->blocked);
		if (in_array($user->data()->username, $blockee->blockee) || in_array($user->data()->username, $blockee->blocker)){
			echo 'unblock';
		}
		else {
			echo 'block';
		}
	}
	elseif (input::get('report')) {
		Email("report@mailinator.com", "Reported user", $user->data()->username . " has reported " . input::get('report') . " as a fake user");
	}
	else if (input::get('likestatus')){
		if (input::get('me') == "liker"){
			$db->query("INSERT INTO `likes` (`liker_id`, `likee_id`, `chat` ) VALUES (?, ?,'') ON DUPLICATE KEY UPDATE `liker_stat` = NOT `liker_stat`", array('liker_id' => intval($user->data()->user_id), 'likee' => intval(input::get('them'))));
			$db->query("SELECT `likee_stat` FROM `likes` WHERE `liker_id` = ? AND `likee_id` = ?", array('liker_id' => intval($user->data()->user_id), 'likee_id' => intval( input::get('them'))));	
		}	
		else{
			$db->query("UPDATE `likes` SET `likee_stat` = NOT `likee_stat` WHERE `liker_id` = ? AND `likee_id` = ?", array('liker_id' => intval( input::get('them')), 'likee_id' => intval($user->data()->user_id)));
			$db->query("SELECT `liker_stat` FROM `likes` WHERE `liker_id` = ? AND `likee_id` = ?", array('liker_id' => intval( input::get('them')), 'likee_id' => intval($user->data()->user_id)));
		}
		$test = $db->results();
		echo json_encode($test);
	} else if (input::get('blockstat')){
		$user2 = new user(input::get('blockstat'));
		$blockee = json_decode($user2->data()->blocked);
		if (in_array($user->data()->username, $blockee->blockee) || in_array($user->data()->username, $blockee->blocker)){
			echo 'unblock';
		}
		else {
			echo 'block';
		}
	}
	elseif (input::get('likecheck')) {
		$db->query("SELECT * FROM `likes` WHERE (`liker_id` = ". intval($user->data()->user_id)." AND `likee_id` = ?) OR (`liker_id` = ? AND `likee_id` = ". intval($user->data()->user_id).")", array('liker_id' => intval( input::get('them')), 'likee_id' => intval( input::get('them'))));
		echo isset($db->results()[0]) ? json_encode($db->results()) : "0";
	}

}


